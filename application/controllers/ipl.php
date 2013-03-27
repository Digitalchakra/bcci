<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ipl extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
	}
	function points()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		$this->iplmodel->getPoints(10,0);
	}
	function schedule()
	{
		$this->load->helper('url');
		$this->load->model('match');
		//$this->match->getUpcomingMatch($config['per_page'], $page, $srs_id);
		$this->match->getUpcomingMatch(20, 0,2170);
	}
}
