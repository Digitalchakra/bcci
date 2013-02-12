<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Article extends CI_Controller
{
	function getlist()
	{
		$this->load->model('articlemodel');
		$data['resultset']=$this->articlemodel->getArticles(5,0);
		$this->load->view('json',$data);
	}
	function get()
	{
		$this->load->helper('url');
		$this->load->model('articlemodel');
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$data['content'] = $this->articlemodel->getArticle($id);
		//print_r($data); die;
		$data['view_page'] = 'article';
		$this->load->view('template', $data);
	}
	function index()
	{
		$this->load->helper('url');
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $data['content'] = $this->articlemodel->getArticles($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$data['view_page'] = 'articles';
		$this->load->view('template', $data);
	}
}
?>
