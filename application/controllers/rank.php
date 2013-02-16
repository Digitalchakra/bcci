<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rank extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
	}
	function team_json()
	{
		$this->load->model('rankmodel');
		$result=$this->rankmodel->getTeamRank(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function batsman_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBatsman(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function bowler_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBowler(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function allrounder_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getAllRounder(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function team()
	{
		$this->load->model('rankmodel');
        $data['content'] = $this->rankmodel->getTeamRank(50,0);
        //echo "<pre>";
		//print_r($data); die;
		$data['view_page'] = 'team_rank';
		$this->load->view('template', $data);
	}
	function batsman()
	{
		$this->load->model('rankmodel');
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
		
		$result = $this->rankmodel->getBatsman(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function bowler()
	{
		$this->load->model('rankmodel');	
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
		
		$result = $this->rankmodel->getBowler(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function allrounder()
	{
		$this->load->model('rankmodel');
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
		
		$result = $this->rankmodel->getAllRounder(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
}
?>
