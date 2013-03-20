
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   //session_destroy();
   $this->session->sess_destroy();
   redirect('home', 'refresh');
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

