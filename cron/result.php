<?php
/*try
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
*/
include('simple_html_dom.php');
require('db.php');
class Tbl_results extends ActiveRecord\Model { }
try
{
$url='http://www.foxsports.com.au/cricket/results';
$url_base='http://www.foxsports.com.au';
$html = file_get_html($url);
/*foreach($html->find('div#yui-main') as $main)
	foreach($main->find('div.yom-recent-live-upcoming ul li.live div.bd') as $ul)
		file_put_contents(dirname(__FILE__).'/live.txt', $ul->innertext);*/
$i=-1;
$list=array();
$line=array();
foreach($html->find('table.cricket-results-table tr') as $main)
	{
		$skiploop=0;
		/*$tablewidth=$main->getAttribute('class'); 
		if($tablewidth=='header')
		{
			//$i++;
			//file_put_contents(dirname(__FILE__).'/result.htm', "<table>");
			//continue;
		}*/
		foreach($main->find('td') as $td)
			{
				if(!$skiploop)
				{
				$td_txt = $td->plaintext;
				if($td->getAttribute('class')=='cricket-res-table-comp')
				{
					if($td_txt!='ODD' && $td_txt!='SHEF')
					{
						$line[$i]['type'] = $td_txt;
						/*if(!in_array($td_txt,$list))
							{
								$list[]=$td_txt;
							}*/
					}
					else
					{
						$skiploop=1;
					}
				}
				else if($td->getAttribute('class')=='cricket-res-table-date')
				{
					$line[$i]['date'] = trim($td_txt);
				}
				else if($td->getAttribute('class')=='cricket-res-table-teams')
				{
					$line[$i]['team'] = $td_txt;
				}
				else
				{
				$line[$i]['result'] = $td_txt;
				foreach($td->find('a') as $link)
					{
						$href=$link->getAttribute('href');
						$line[$i]['match_id']=end( explode( 'matchid=', substr($href,strpos( $href, 'matchid')) ) ); 
						$line[$i]['link'] = $url_base.$href;
					}
				}
			}				
			}
			$i++;
	}
	//$data['menu']=$list;
	//$data['list']=$line;
	//echo "<pre>";
	//print_r($line); die;
	//db insertion
		if(count($line)>0)
		{
			//Tbl_results::connection()->query('TRUNCATE TABLE `tbl_news`');
			foreach($line as $row)
			{
				Tbl_results::create($row);		
			}
		}
	//file_put_contents(dirname(__FILE__).'/result.json', json_encode($data));

}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live score	 failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}

?>
