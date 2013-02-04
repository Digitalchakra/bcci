<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		echo file_get_contents(base_url('cron/player.txt'));
	}
}
?>
