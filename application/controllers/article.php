<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Article extends CI_Controller
{
	function getlist()
	{
		$this->load->model('articlemodel');
		$data['resultset']=$this->articlemodel->getArticles(7,0);
		$this->load->view('json',$data);
	}
	function get()
	{
		$this->load->helper('url');
		$this->load->model('articlemodel');
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['content'] = $this->articlemodel->getArticle($id);
		//print_r($data); die;
		$data['view_page'] = 'article';
		$this->load->view('template', $data);
	}
	function index()
	{
		$this->load->helper('url');
		$userdata=$this->phpbb_library->get_session_user();
			if($userdata['group_id']==5)
			{
				redirect(base_url("article/admin_list"));
			}
		else

		{
		$this->load->model('articlemodel');
		$config = array();
        $config['base_url'] = base_url() . 'article/index';
        $config['total_rows'] = $this->articlemodel->recordCount();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links']=5;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['content'] = $this->articlemodel->getArticles($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$data['view_page'] = 'articles';
		$this->load->view('template', $data);
		}
	}
	function admin_list()
	{
					$this->load->helper('url');
					$userdata=$this->phpbb_library->get_session_user();
		if($userdata['is_registered']==1)
		{
			if($userdata['group_id']==5)
			{

			$this->load->model('articlemodel');
			$config = array();
	        $config['base_url'] = base_url() . 'article/admin_list';
	        $config['total_rows'] = $this->articlemodel->recordCount();
	        $config['per_page'] = 20;
	        $config['uri_segment'] = 3;
	        $config['num_links']=5;
	        $config['full_tag_open'] = '<li>';
	        $config['full_tag_close'] = '</li>';
	        $config['next_link'] = 'Next';
	        $config['prev_link'] = 'Prev';
	        $config['cur_tag_open'] = '<a href="#" class="active">';
	        $config['cur_tag_close'] = '</a>';
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['content'] = $this->articlemodel->getArticles($config['per_page'], $page);
			$data['links'] = $this->pagination->create_links();
			//print_r($data); die;
			$data['view_page'] = 'admin_articles';
			$this->load->view('template', $data);
			}
		else
		{
			redirect(base_url("unauthorized"));
		}
		}
		else
		{
			redirect(base_url());
		}
		
	}
	function add()
	{
		$this->load->helper('url');
			$userdata=$this->phpbb_library->get_session_user();
		if($userdata['is_registered']==1)
		{
			if($userdata['group_id']==5)
			{
		$this->load->model('articlemodel');
		$data['view_page'] = 'article_edit';
		$this->load->view('template', $data);
			}
		else
		{
			redirect(base_url("unauthorized"));
		}
		}
		else
		{
			redirect(base_url());
		}

	}
	function edit()
	{
				$this->load->helper('url');
			$userdata=$this->phpbb_library->get_session_user();
		if($userdata['is_registered']==1)
		{
			if($userdata['group_id']==5)
			{

		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->model('articlemodel');
		$data['content'] = $this->articlemodel->getArticle($id);
		$data['view_page'] = 'article_edit';
		$this->load->view('template', $data);
		}
		else
		{
			redirect(base_url("unauthorized"));
		}
		}
		else
		{
			redirect(base_url());
		}

	}
	function save()
	{
				$this->load->helper('url');
			$userdata=$this->phpbb_library->get_session_user();
		if($userdata['is_registered']==1)
		{
			if($userdata['group_id']==5)
			{

		$id=$this->input->post('art_id', TRUE);
		$data['author']=$this->input->post('author', TRUE);
		$data['content']=nl2br($this->input->post('content', TRUE));
		$data['title']=$this->input->post('title', TRUE);
		$data['views']=0;
		$this->load->model('articlemodel');
		$this->articlemodel->addArticle($data,$id);
		redirect(base_url("article/admin_list"));
		}
		else
		{
			redirect(base_url("unauthorized"));
		}
		}
		else
		{
			redirect(base_url());
		}

	}
	function date_add_existing_record()
	{
		$userdata=$this->phpbb_library->get_session_user();
		if($userdata['is_registered']==1)
		{
			if($userdata['group_id']==5)
			{
				$this->load->model('articlemodel');
				$this->articlemodel->date_add_existing_record($this->articlemodel->recordCount());
			}
		else
		{
			redirect(base_url("unauthorized"));
		}
		}
		else
		{
			redirect(base_url());
		}
		
	}
}
?>
