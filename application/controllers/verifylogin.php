<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
  // $this->load->helper('url');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
    $data['errors']=validation_errors();
    $data['success']='no';
    $result['resultset']=$data;
    $this->load->view('json',$result);
     //$this->load->view('login_view');
   }
   else
   {
      $data['success']='yes';
      $result['resultset']=$data;
      $this->load->view('json',$result);
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');
$auth = new auth();
$result=$auth->login($username, $password);
//print_r($result); die;
if($result['status']==3)
  {
	       $sess_array = array(
           'id' => $result['user_row']['user_id'],
           'firstname' => $result['user_row']['username'],
           'lastname' => $result['user_row']['username'],
           'email' => $result['user_row']['user_email'],
           'admin' => 1,
         );
         $this->session->set_userdata('logged_in', $sess_array);
}
 else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
}
}
?>
