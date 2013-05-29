<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Unauthorized extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		$data['view_page'] = 'unauthorized';
		$this->load->view('template', $data);
	}
}