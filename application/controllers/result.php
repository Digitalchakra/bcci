<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		/*below code added in cron/result.php
		$data=array();
		$result=array();
		try
			{	
			$xmlDoc = new DOMDocument();
			$xmlpath=base_url('cron/result.txt');
			$xmlDoc->load($xmlpath);
			$search = $xmlDoc->getElementsByTagName( "item" );
			}
		catch (Exception $e)
			{
				$error_msg="Read xml failed @ BCCI";
				error_log($error_msg, 1,"manimani1014@gmail.com");
			}
			foreach( $search as $searchNode )
			{
			$result[]=$searchNode->getElementsByTagName('title')->item(0)->nodeValue;	
			}
			$data['resultset']=$result;
			$this->load->view('json',$data);
			*/
			//header('Content-Type:application/json');
			echo file_get_contents(base_url('cron/result.txt'));
	}
}
?>
