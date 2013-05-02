
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function logout()
 {
 // print_r($this->phpbb_library->get_session_user()); die;
  $this->phpbb_library->user_logout();
  $this->session->unset_userdata('logged_in');
  $this->session->sess_destroy();
  $this->load->helper('url');
  header( 'Location:'.$_SERVER['HTTP_REFERER'] ) ;
 }
 function getjsonp()
 {
  require_once FCPATH.'application/third_party/jsConnectPHP/functions.jsconnect.php';
  //clientid and scret from venilla forum jscoonect plugin
  $clientID = $this->config->item('forumclientID');
  $secret = $this->config->item('forumsecret');
  $signedIn = true;
  //$secure = true;
  $secure = false;
  $user = array();
  $session_data=array();
  if($this->session->userdata('logged_in'))
     {
      $session_data = $this->session->userdata('logged_in');
      $user['uniqueid'] = $session_data['id'];
      $user['name'] = $session_data['firstname'].' '.$session_data['lastname'];
      $user['email'] = $session_data['email'];
      $user['photourl'] = '';
     }
     WriteJsConnect($user, $_GET, $clientID, $secret, $secure);
 }

}

?>
