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
}
?>
