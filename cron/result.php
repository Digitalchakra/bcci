<?php
try
	{
		$site_contents = file_get_contents('http://static.cricinfo.com/rss/livescores.xml');	
		file_put_contents(dirname(__FILE__).'/result.txt', $site_contents);
		$xmlDoc = new DOMDocument();
		//$xmlpath=base_url('cron/result.txt');
		$xmlpath=dirname(__FILE__).'/result.txt';
		$xmlDoc->load($xmlpath);
		$search = $xmlDoc->getElementsByTagName( "item" );
		foreach( $search as $searchNode )
			{
			$result[]=$searchNode->getElementsByTagName('title')->item(0)->nodeValue;	
			}
			$data['resultset']=$result;
			file_put_contents(dirname(__FILE__).'/result.json', json_encode($data));
	}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live result xml failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}


?>
