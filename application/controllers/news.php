<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class News extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		/*below code added in cron/news.php
		 * 
		 * $data=array();
		$result=array();
		$str_to_remove=array('VIDEO:','AUDIO:');
		try
			{	
			$xmlDoc = new DOMDocument();
			$xmlpath=base_url('cron/news.txt');
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
				//$node['title']=str_replace($str_to_remove,'',$searchNode->getElementsByTagName('title')->item(0)->nodeValue);
				$node['title']=$searchNode->getElementsByTagName('title')->item(0)->nodeValue;
				$node['description']=$searchNode->getElementsByTagName('description')->item(0)->nodeValue;
				$node['pubDate']=$searchNode->getElementsByTagName('pubDate')->item(0)->nodeValue;
				$node['link']=$searchNode->getElementsByTagName('link')->item(0)->nodeValue;
				$node['media']=$searchNode->getElementsByTagNameNS('http://search.yahoo.com/mrss/', 'thumbnail')->item(1)->getAttribute('url');
				$result[]=$node;
			}
			$data['resultset']=$result;
			//load image from link site
			$site_contents=file_get_contents($result[0]['link']);
			$doc = new DOMDocument();
			$doc->loadHTML($site_contents);
			$data['resultset']['img']=$doc->getElementById('lead')->getElementsByTagName('img')->item(0)->getAttribute('src');
			$this->load->view('json',$data);
			*/
			header('Content-Type:application/json');
			echo file_get_contents(base_url('cron/news.json'));
	}
}
?>
