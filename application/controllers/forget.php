
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
 }

 function index()
 {
	 $username = $this->input->post('username');
		 $this->load->model('user_forum');
		 $check_data=array('username'=>$username);
			if($result = $this->user_forum->check_user($check_data))
			{
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'.time().'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
				$randStr = '';
				for ($p = 0; $p<10; $p++) 
				{
					$randStr .= $seed[mt_rand(0, 40)];
				}
				$update_data= array(
							'user_actkey'=>$randStr
						  );
				$where=array('username'=>$username);
				if($this->user_forum->update_user($where,$update_data))
				{
					$this->load->library('email');
					#$config['protocol'] = 'sendmail';
					#$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype']='html';
					$this->email->initialize($config);
					$this->email->from('bcci@digitalchakra.in', 'Bindaas Cricket Cafe!');
					$this->email->to($result[0]['user_email']);
					#$this->email->cc('another@another-example.com');
					#$this->email->bcc('them@their-example.com');
					$this->email->subject('Reset your bcci.com password');
					$message= '<b>Forgot your password, '.$result[0]['username'].' ?</b> <br><br>Bcci.com received a request to reset the password to your bcci.com account. To reset your password, click the link below (or copy and paste the URL into your browser):<br><br>'.base_url('forget/reset/'.$result[0]['user_id'].'/'.$update_data['user_actkey']).
					'<br><br><b>It\'s your Bindaas Cricket Cafe!</b>'; 
					$this->email->message($message);
					$this->email->send();
					$data['success']='yes';
					$result['resultset']=$data;
      				$this->load->view('json',$result);
				}
				else
				{
				$data['success']='no';
				$data['errors']='Internal error, please try again!';
				$result['resultset']=$data;
      			$this->load->view('json',$result);
				}
				//$this->load->view('login_view');
				//redirect('home', 'refresh');
			}
			else
			{
				$data['errors']="Invalid username";
				$data['success']='no';
				$result['resultset']=$data;
      			$this->load->view('json',$result);
			}
 }
 function activation()
 {
	 $password = $this->input->post('password');
	 $cpassword = $this->input->post('cpassword');
	 $active = $this->input->post('acode');
	 $email = $this->input->post('email');
	 $id = $this->input->post('uid');
	 if($id)
	 {
	 if($password == $cpassword && strlen($password)>4)
	 {
		 $update_data=array('user_password'=>phpbb_hash($password),'user_actkey '=>'');
		 $where=array('user_id'=>$id,'user_actkey '=>$active);
		 $this->load->model('user_forum');
		 if($this->user_forum->update_user($where,$update_data))
		 {
		 	$check_data=array('user_actkey'=>'bcci','user_id'=>'bcci', 'username'=>'', 'error'=>'Your password was reset successfully!');
			$check_data['view_page'] = 'reset';
			header( "refresh:5; url=".base_url() );
			$this->load->view('template', $check_data);
		 	//$data['view_page'] = 'reset_success';
			//$this->load->view('template', $data);
		 }
		 else
		 {
			$check_data=array('user_actkey'=>$active,'user_id'=>$id, 'username'=>$email, 'error'=>'internal error');
			$check_data['view_page'] = 'reset';
			$this->load->view('template', $check_data);
		 }
	 }
	 else
	 {
		$check_data=array('user_actkey'=>$active,'username'=>$email,'user_id'=>$id, 'error'=>'invalid password');
		$check_data['view_page'] = 'reset';
		$this->load->view('template', $check_data);
	 }
	}
	else
	{
		redirect('login', 'refresh');
	}
 }
 function reset()
 {
	 $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 if(($code) &&  strlen($code)>2)
	 {
		 $this->load->model('user_forum');
		 $check_data=array('user_id'=>$id,'user_actkey'=>$code);
		 if($result = $this->user_forum->check_user($check_data))
		 {
			$check_data['error']='';
			$check_data['username']=$result[0]['username'];
			$check_data['id']=$result[0]['user_id'];
			$check_data['view_page'] = 'reset';
			$this->load->view('template', $check_data);
		 }
		 else
		 {
		 	show_404();
			 //redirect('login', 'refresh');
		 }
	 }
	 else
	 {
	 	show_404();
		 //redirect('login', 'refresh');
	 }
 }
}

?>

