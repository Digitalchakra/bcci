<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter phpBB3 Bridge
* @author Georgi Budinov, credits to Tomaž Muraus at http://www.tomaz-muraus.info
* @link georgi.budinov.com
*/
class Phpbb_library
{
 public $CI;
 protected $_user;

 /**
 * Constructor.
 */
 public function __construct()
 {
   if (!isset($this->CI))
   {
     $this->CI =& get_instance();
   }

   // Set the variables scope
   global $phpbb_root_path, $phpEx, $user, $auth, $cache, $db, $config, $template, $table_prefix;

   $rootPath = $this->CI->config->item('root_path');

   define('IN_PHPBB', TRUE);
   define('FORUM_ROOT_PATH', $rootPath.'forum/');

   $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : FORUM_ROOT_PATH;
   $phpEx = substr(strrchr(__FILE__, '.'), 1);

   // Include needed files
   include($phpbb_root_path . 'common.' . $phpEx);
   include($phpbb_root_path . 'config.' . $phpEx);
   include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
   include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
   include($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
   include($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
   include($phpbb_root_path . 'includes/bbcode.' . $phpEx); 	

   // Initialize phpBB user session
   $user->session_begin();

   $auth->acl($user->data);
   $user->setup();

   // Save user data into $_user variable
   $this->_user = $user;
 }

 /**
 * @param $email
 * @param $username
 * @param $password
 * @return unknown_type</pre>
 */
 public function user_add($email, $username, $password)
 {
   $user_row = array(
     'username'              => $username,
     'user_password'         => phpbb_hash($password),
     'user_email'            => $email,
     'group_id'              => 2, // by default, the REGISTERED user group is id 2
     'user_timezone'         => (float) date('T'),
     'user_lang'             => 'bg',
     'user_type'             => USER_NORMAL,
     'user_ip'               => $_SERVER['REMOTE_ADDR'],
     'user_regdate'          => time(),
   );

   return user_add($user_row, false);
 }

 /**
 * @param $username
 * @param $password
 * @return bool
 */
 public function user_edit($username, $password)
 {
   return user_edit($username, $password);
 }

 /*
 * Logins the user in forum
 */
 public function user_login($username, $password)
 {
   $auth = new auth();

   return $auth->login($username, $password);
 }

 public function user_logout()
 {
   $this->_user->session_kill();
   $this->_user->session_begin();
 }

 /**
 * @param $user_id
 * @return unknown_type
 */
 public function user_delete($user_id)
 {
   return user_delete('remove', $user_id, false);
 }
 function get_session_user()
 {
    return $this->_user->data;
 }
 function get_latest_post()
{
	global $db, $auth;
	 $search_limit = 1;
                  $posts_ary = array(
    'SELECT' => 'p.*, t.*, u.username, u.user_colour',

    'FROM' => array(
    POSTS_TABLE => 'p',
    ),

    'LEFT_JOIN' => array(
    array(
    'FROM' => array(USERS_TABLE => 'u'),
    'ON' => 'u.user_id = p.poster_id'
    ),
    array(
    'FROM' => array(TOPICS_TABLE => 't'),
    'ON' => 'p.topic_id = t.topic_id'
    ),
    ),

    'WHERE' => $db->sql_in_set('t.forum_id', array_keys($auth->acl_getf('f_read', true))) . '
    AND t.topic_status <> ' . ITEM_MOVED . '
    AND t.topic_approved = 1',

    'ORDER_BY' => 'p.post_id DESC',
    );

    $posts = $db->sql_build_query('SELECT', $posts_ary);

    $posts_result = $db->sql_query_limit($posts, $search_limit);

    while ($posts_row = $db->sql_fetchrow($posts_result))
    {
    $topic_title = $posts_row['topic_title'];
    $post_author = get_username_string('full', $posts_row['poster_id'], $posts_row['username'], $posts_row['user_colour']);
    $post_date = date($this->_user->data['user_dateformat'],$posts_row['post_time']);
    $post_link = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "p=" . $posts_row['post_id'] . "#p" . $posts_row['post_id']);

    $post_text = nl2br($posts_row['post_text']);

    $bbcode = new bbcode(base64_encode($bbcode_bitfield));
    $bbcode->bbcode_second_pass($post_text, $posts_row['bbcode_uid'], $posts_row['bbcode_bitfield']);

    $post_text = smiley_text($post_text);

    $res= array(
    'TOPIC_TITLE' => censor_text($topic_title),
    'POST_AUTHOR' => $post_author,
    'POST_DATE' => $post_date,
    'POST_LINK' => $post_link,
    'POST_TEXT' => censor_text($post_text),
    );
    return $res;
    //die;
	}
	}
}
