<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		$this->load->model('match');
		$config = array();
        $config["base_url"] = base_url() . "index.php/home/index";
        $config["total_rows"] = $this->match->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


		
		$data['body_content'] = 'home';
		
		$data['data'] = $this->match->getSchedule($config["per_page"], $page);
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$this->load->view('template', $data);
	}

}
