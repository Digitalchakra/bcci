<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Live extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		#$this->load->model('match');
		//has to change to base path, cuurently having some issue in access it
		include('/var/www/bcci/application/third_party/simple_html_dom.php');
		$html = file_get_html('http://cricket.yahoo.com/cricket/live-score');
		foreach($html->find('div#yui-main') as $main)
		foreach($main->find('div.yom-recent-live-upcoming ul li.live div.bd') as $ul)
		echo $ul->innertext;
		//echo $e->innertext . '<br>';
	}

}
