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
		$data['content']['ODI'] = $this->resultmodel->getResults(50, 0,'ODI');
		$data['content']['Test'] = $this->resultmodel->getResults(50,0,'Test');
		$data['content']['T20'] = $this->resultmodel->getResults(50,0,'T20');
		$data['view_page'] = 'result';
		$data['base_url']=base_url() . 'result/index/';
		//print_r($data); die;
		$this->load->view('template', $data);
		
	}
}
?>
