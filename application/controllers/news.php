<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class News extends CI_Controller
{
	function getlist()
	{
		$this->load->model('newsmodel');
		$data['resultset']=$this->newsmodel->getNews(7,0);
		$this->load->view('json',$data);
	}
	function index()
	{
		$this->load->helper('url');
		$this->load->model('newsmodel');
		
		
		//$data['resultset']=$this->newsmodel->getNews();
		//$news_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : $data['srs_list'][0]->srs_id;
		$config = array();
        $config['base_url'] = base_url() . 'news/index';
        $config['total_rows'] = $this->newsmodel->recordCount();
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		
		$data['content'] = $this->newsmodel->getNews($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		 $data['view_page'] = 'news';
		//$data['content'] = $this->match->getMatchs(5, 0);
		$this->load->view('template', $data);
		
	}
}
?>
