<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		$this->load->model('match');
		$data['view_page'] = 'home';
		$data['content'] = $this->match->getMatchs(5, 0);
		$this->load->view('template', $data);
	}

}
