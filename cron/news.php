<?php
try
	{
		$data=array();
		$result=array();
		$desc_html='';
		$str_to_remove=array('VIDEO:','AUDIO:');
		//load site and save as file
		$site_contents = file_get_contents('http://feeds.bbci.co.uk/sport/0/cricket/rss.xml');	
		file_put_contents(dirname(__FILE__).'/news.txt', $site_contents);
		
		//load file and read tags
		$xmlDoc = new DOMDocument();
		$xmlpath=dirname(__FILE__).'/news.txt';
		$xmlDoc->load($xmlpath);
		$search = $xmlDoc->getElementsByTagName( "item" );
		foreach( $search as $searchNode )
			{
				//$node['title']=str_replace($str_to_remove,'',$searchNode->getElementsByTagName('title')->item(0)->nodeValue);
				$node['title']=$searchNode->getElementsByTagName('title')->item(0)->nodeValue;
				$node['description']=$searchNode->getElementsByTagName('description')->item(0)->nodeValue;
				$node['pubDate']=$searchNode->getElementsByTagName('pubDate')->item(0)->nodeValue;
				$node['link']=$searchNode->getElementsByTagName('link')->item(0)->nodeValue;
				$node['media']=$searchNode->getElementsByTagNameNS('http://search.yahoo.com/mrss/', 'thumbnail')->item(0)->getAttribute('url');
				$result[]=$node;
			}
			$data['resultset']=$result;
			
			// load image from link site
			$site_contents=file_get_contents($result[0]['link']);
			$doc = new DOMDocument();
			if($doc->loadHTML($site_contents))
			{
			//banner image
			$data['banner']['img']=$doc->getElementById('lead')->getElementsByTagName('img')->item(0)->getAttribute('src');
			
			//feature news
			$desc_array = $doc->getElementById('storypage-container')->getElementsByTagName('p');
			foreach($desc_array as $desc)
			{
				$desc_html=$desc_html.'<p>'.$desc->nodeValue.'</p>';
			}
			$data['fnews']['desc']=$desc_html;
			}
			else
			{
			$data['banner']['img']=$result[0]['media'];
			$data['fnews']['desc']=$result[0]['description'];
			}
			$data['banner']['desc']=$result[0]['description'];
			//save array in to file 
			file_put_contents(dirname(__FILE__).'/news.json', json_encode($data));
	}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live result xml failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}


?>
