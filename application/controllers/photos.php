<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Photos extends CI_Controller
{
	function getlist()
	{
		$this->load->model('photosmodel');
		$data['resultset']=$this->photosmodel->getList(12,0);
		$this->load->view('json',$data);
	}
	function index()
	{
		$this->load->helper('url');
		$this->load->model('photosmodel');
		$config = array();
        $config['base_url'] = base_url() . 'photos/index';
        $config['total_rows'] = $this->photosmodel->recordCount();
        $config['per_page'] = 18;
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
        $data['content'] = $this->photosmodel->getList($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$data['view_page'] = 'photos';
		$this->load->view('template', $data);
	}
}
?>
