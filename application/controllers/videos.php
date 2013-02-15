<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Videos extends CI_Controller
{
	function getlist()
	{
		$this->load->model('videosmodel');
		$data['resultset']=$this->videosmodel->getVideos();
		$this->load->view('json',$data);
	}
}
?>
