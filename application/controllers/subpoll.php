<?php if( ! defined('BASEPATH')) exit ('No direct script access allowed');

/**
 *	Example controller for SubPoll library
 *
 */
class Subpoll extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('poll');
	}
	
	public function index()
	{
		$this->poll_item();
	}
	
	/**
	 *	Shows the actual poll and processes the posted vote
	 *  If a user has already voted, error message will be shown
	 *
	 */
	public function pollitem()
	{
		if($this->input->post('submit'))
		{
			if($this->session->userdata('voted') != 'true')
			{
				$this->poll->set_poll($this->input->post('answer'));
				$this->pollresult();
			}
			else
			{
				$result['success']=-1;
				$result['msg']="You have already voted on this poll!";
				$data['resultset']=$result;
				$this->load->view('json',$data);
			}			
		}
		else if($this->session->userdata('voted') == 'true')
			{
				$this->pollresult();
				//$result['success']=-1;
				//$result['msg']="You have already voted on this poll!";
				//$data['resultset']=$result;
				//$this->load->view('json',$data);
			}
		else
		{
			$data['resultset'] = $this->poll->getpoll();
			$data['resultset']['success']=1;
			$this->load->view('json',$data);		
		}
	}
	public function poll_item()
	{
		if($this->input->post('submit'))
		{
			if($this->session->userdata('voted') != 'true')
			{
				$this->poll->set_poll($this->input->post('answer'));
				redirect('subpoll/poll_result');
			}
			else
			{
				$this->session->set_flashdata('message', 'You have already voted on this poll!');
				redirect('subpoll');
			}			
		}
		else
		{
			$data['poll'] = $this->poll->get_poll();
			$this->load->vars($data);
			$this->load->view('poll_item');		
		}
	}
	
	/**
	 *	Shows the actual poll's results	
	 *
	 */
	public function poll_result()
	{
		$data['poll'] = $this->poll->get_result();
		$this->load->vars($data);
		$this->load->view('poll_result');		
	}
	public function pollresult()
	{
		$data['resultset'] = $this->poll->getresult();
		$data['resultset']['success']=2;
		$this->load->view('json',$data);		
	}
	
	/**
	 *	Polls management
	 *
	 */
	public function admin_polls()
	{
		if($session_data = $this->session->userdata('logged_in'))
		{
			if($session_data['admin']==1)
			{
				$data['polls'] = $this->poll->get_all_polls();
				$this->load->view('poll_admin', $data);
			}
			else
			{
				redirect('home');
			}
		}
		else
		{
			redirect('home');
		}
	}
	
	/**
	 *	Add new poll
	 *
	 */
	public function add_new_poll()
	{
		if($session_data = $this->session->userdata('logged_in'))
		{
			if($session_data['admin']==1)
			{
		
				if($this->input->post('submit'))
				{
					$this->load->library('form_validation');
					$val = $this->form_validation;
					$val->set_rules('poll', 'Poll Question', 'required|trim');
					foreach($this->input->post() as $key => $value)
					{
						if(substr($key, 0, 6) == 'answer')
						{
							$val->set_rules('answer'.substr($key, 6), 'Answer '.substr($key, 6), 'required|trim');
							$data['answers'][substr($key, 6)] = $value;
						}
					}
					if($val->run())
					{
						$data['question'] = $val->set_value('poll');
						$this->poll->save_new_poll($data);
						redirect('subpoll/admin_polls');
					}
				}
				$this->load->view('poll_new');
			}
			else
			{
				redirect('home');
			}
		}
		else
		{
			redirect('home');
		}
	}
	
	/**
	 *	Set poll status
	 *  @param integer $id
	 *
	 */
	public function set_poll_status($id)
	{
		if($session_data = $this->session->userdata('logged_in'))
		{
			if($session_data['admin']==1)
			{
				$this->poll->set_poll_status($id);
				redirect('subpoll/admin_polls');
			}
			else
			{
				redirect('home');
			}
		}
		else
		{
			redirect('home');
		}
	}
	
    /**
	 *	Reset poll values
	 *  @param integer $id
	 *
	 */
	public function reset_poll($id)
	{
		if($session_data = $this->session->userdata('logged_in'))
		{
			if($session_data['admin']==1)
			{
				$this->poll->reset_poll($id);
				redirect('subpoll/admin_polls');
			}
			else
			{
				redirect('home');
			}
		}
		else
		{
			redirect('home');
		}	
	}
}