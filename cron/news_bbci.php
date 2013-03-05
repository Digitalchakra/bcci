<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_news extends ActiveRecord\Model { }
$log_title = "BCCI NEWS CRON ";
try
	{
		$data=array();
		$result=array();
		$desc_html='';
		$str_to_remove=array('VIDEO:','AUDIO:');

		$xmlDoc = new DOMDocument();

		if(!$xmlDoc->load('http://feeds.bbci.co.uk/sport/0/cricket/rss.xml'))
		{
			notify($log_title,'failed to read the NEWS URL');
		}
		$search = $xmlDoc->getElementsByTagName( "item" );
		foreach( $search as $searchNode )
			{
				$search_link="bbc.co.uk/sport/0/cricket/";
				if(!strpos($searchNode->getElementsByTagName('link')->item(0)->nodeValue, $search_link)){
					continue;
				}
				//$node['title']=str_replace($str_to_remove,'',$searchNode->getElementsByTagName('title')->item(0)->nodeValue);
				$node['title']=$searchNode->getElementsByTagName('title')->item(0)->nodeValue;
				$node['description']=$searchNode->getElementsByTagName('description')->item(0)->nodeValue;
				$node['pubdate']=$searchNode->getElementsByTagName('pubDate')->item(0)->nodeValue;
				$node['link']=$searchNode->getElementsByTagName('link')->item(0)->nodeValue;
				$node['media1']=$searchNode->getElementsByTagNameNS('http://search.yahoo.com/mrss/', 'thumbnail')->item(0)->getAttribute('url');
				$node['media2']=$searchNode->getElementsByTagNameNS('http://search.yahoo.com/mrss/', 'thumbnail')->item(1)->getAttribute('url');
				$result[]=$node;	
			}
		
			
			
			if($html = file_get_html($result[0]['link']))
			{
				//feature news
				foreach($html->find('div.article') as $main)
					{
						if($main->getAttribute('role')=='main')
						{
							$i=0;
							foreach($main->find('p') as $p)
							{
								if($p->getAttribute('class')=='event-coverage')
								continue;
								if($i>3)
								break;
								$desc_html=$desc_html.$p->outertext;
								$i++;
							}
						}
					}
			$result[0]['description']=$desc_html;
			//banner image
			foreach($html->find('div#lead img') as $main)
			{
				$result[0]['media1'] = $main->getAttribute('src');
			}
			
			}

			
		//db insertion
		if(count($result)>0)
		{
			Tbl_news::connection()->query('TRUNCATE TABLE `tbl_news`');
			foreach($result as $row)
			{
				Tbl_news::create($row);		
			}
		}
		else
		{
			notify($log_title,'NEWS URL is empty');
		}
	}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}


?>
