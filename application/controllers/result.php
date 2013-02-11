<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Result extends CI_Controller
{
	function getlist()
	{
		$this->load->model('resultmodel');
		$data['resultset']=$this->resultmodel->getResult(5,0);
		$this->load->view('json',$data);
	}
	function index()
	{
		$this->load->helper('url');
		$this->load->model('resultmodel');
		
		
		//$data['resultset']=$this->newsmodel->getNews();
		$type = ($this->uri->segment(3)) ? $this->uri->segment(3) : 'ODI';
		$config = array();
        $config['base_url'] = base_url() . 'result/index/'.$type;
        $config['total_rows'] = $this->resultmodel->recordCount($type);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['num_links']=5;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['content'] = $this->resultmodel->getResults($config['per_page'], $page,$type);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		 $data['view_page'] = 'result';
		//$data['content'] = $this->match->getMatchs(5, 0);
		//print_r($data); die;
		$this->load->view('template', $data);
		
	}
}
?>
