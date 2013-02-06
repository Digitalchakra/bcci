<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class News extends CI_Controller
{
	function index()
	{
		$this->load->model('newsmodel');
		$data['resultset']=$this->newsmodel->getNews();
		$this->load->view('json',$data);
	}
}
?>
