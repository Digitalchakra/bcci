
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
 }
function test()
{
	echo "Rgvrgv";
	$user_row = array(
     'username'              => "manimani1014",
     'user_password'         => phpbb_hash("password"),
     'user_email'            => "manimani1014@gmail.com",
     'group_id'              => 2, // by default, the REGISTERED user group is id 2
     'user_timezone'         => (float) date('T'),
     'user_lang'             => 'en',
     'user_type'             => USER_NORMAL,
     'user_ip'               => $_SERVER['REMOTE_ADDR'],
     'user_regdate'          => time(),
     'user_type'				 => 1,
     'user_actkey'			 =>'dddddddddddddd',
   );
		if($result = user_add($user_row))
		{
			echo "weefewfew";
		}
		else
		{
			echo "wrvssdvrrv";
		}
         print_r($result); 
          echo "fgwrfwgrwe";
}
 function index()
 {
	 if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $this->load->view('home', $data);
	   }
	   else
	   {
		$this->load->library('form_validation');
		  // field name, error message, validation rules
		  $this->form_validation->set_rules('uname', 'User Name', 'trim|required|min_length[4]|max_length[20]|xss_clean');
		  //$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[20]|xss_clean');
		  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email');
		  $this->form_validation->set_rules('pass_word', 'Password', 'trim|required|min_length[4]|max_length[32]');
		  //$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		  if($this->form_validation->run() == FALSE)
		  {
			$data['errors']=validation_errors();
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else
		  {
		  		$this->load->model('user_forum');
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'.time().'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
				$randStr = '';
				for ($p = 0; $p<10; $p++) 
				{
					$randStr .= $seed[mt_rand(0, 40)];
				}

			$user_row = array(
							     'username'              => $this->input->post('uname'),
							     'user_password'         => phpbb_hash($this->input->post('pass_word')),
							     'user_email'            => $this->input->post('email_address'),
							     'group_id'              => 2, // by default, the REGISTERED user group is id 2
							     'user_timezone'         => (float) date('T'),
							     'user_lang'             => 'en',
							     'user_type'             => USER_NORMAL,
							     'user_ip'               => $_SERVER['REMOTE_ADDR'],
							     'user_regdate'          => time(),
							     'user_type'				 => 1,
							     'user_actkey'			 =>$randStr,
							   );
			$check_data=array('username'=>$user_row['username']);
			if(!$this->user_forum->check_user($check_data))
			{
				if($userID=user_add($user_row))
				{
					$this->load->library('email');
					#$config['protocol'] = 'sendmail';
					#$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype']='html';
					$this->email->initialize($config);
					$this->email->from('bcci@digitalchakra.in', 'Bindaas Cricket Cafe!');
					$this->email->to($user_row['user_email']);
					#$this->email->cc('another@another-example.com');
					#$this->email->bcc('them@their-example.com');
					$this->email->subject('Confirm your bcci.com account, '.$user_row['username']);
					$message= 'You\'re almost there! Just confirm your Email.<br><br>
					You have successfully created a bcci.com account and all you need to do is activate it. It will give you full access to bcci.com and all future notifications will be sent to this email address.
					<br><br>
					Please click on the link below to verify your email.  <a href="'.base_url('registration/activation/'.$userID.'/'.$randStr).'">Confirm my account now</a>
					<br><br>
					Or click on the link below:
					<br><br>
					'.base_url('registration/activation/'.$userID.'/'.$randStr).'
					<br><br>
					<br><br>
					<b>It\'s your Bindas Cricket Cafe!</b>	'; 
					$this->email->message($message);
					if($this->email->send())
					{
						$data['mail']='yes';
					}
					else
					{
						$data['mail']='no';
					}
					$data['success']='yes';
					$result['resultset']=$data;
					$this->load->view('json',$result);
				}
			}
			else
			{
				$data['errors']="User name not available";
				$data['success']='no';
				$result['resultset']=$data;
				$this->load->view('json',$result);
			}
		   
		  
		  }
	   }
   
 }
 function activation()
 {
	 $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 if(($id) &&  strlen($code)>2)
	 {
		 $this->load->model('user_forum');
		 if($this->user_forum->activate_user($id,$code))
		 {
			$data['view_page'] = 'regiter_success';
			$this->load->view('template', $data);
		 }
		 else
		 {
		 	show_404();
			 //redirect('home', 'refresh');
		 }
	 }
	 else
	 {
	 	show_404();
		//redirect('home', 'refresh');
	 }
 }

}

?>
