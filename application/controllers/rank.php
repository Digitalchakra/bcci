<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rank extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
	}
	function team()
	{
		$this->load->model('rankmodel');
		$result=$this->rankmodel->getTeamRank();
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function batsman()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBatsman();
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function bowler()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBowler();
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function allrounder()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getAllRounder();
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
}
?>
