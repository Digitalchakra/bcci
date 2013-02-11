<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Schedule extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		$this->load->model('match');
		#$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
		$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
		
		$data['srs_list'] = $this->match->getUpcomingSrs($today_end);
		$srs_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : $data['srs_list'][0]->srs_id;
		$data['srs_name']=
		$config = array();
        $config['base_url'] = base_url() . 'schedule/index/'.$srs_id;
        $config['total_rows'] = $this->match->recordCountUpcoming($today_end,$srs_id);
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
		
		$data['content'] = $this->match->getUpcomingMatch($config['per_page'], $page, $srs_id);
		$data['base_url']=base_url() . 'schedule/index/';
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$data['view_page'] = 'schedule';
		$this->load->view('template', $data);
	}
	function srs_list()
	{
		$this->load->model('match');
		$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
		$data['resultset'] = $this->match->getUpcomingSrs($today_end,4);
		$this->load->view('json',$data);
	}

}
