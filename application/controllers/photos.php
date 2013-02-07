<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Photos extends CI_Controller
{
	function index()
	{
		$this->load->model('photosmodel');
		$data['resultset']=$this->photosmodel->getPhotos();
		$this->load->view('json',$data);
	}
}
?>
