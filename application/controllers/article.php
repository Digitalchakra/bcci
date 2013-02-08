<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Article extends CI_Controller
{
	function index()
	{
		$this->load->model('articlemodel');
		$data['resultset']=$this->articlemodel->getArticles();
		$this->load->view('json',$data);
	}
}
?>
