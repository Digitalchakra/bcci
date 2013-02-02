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
try
{
$url='http://www.foxsports.com.au/cricket/results';
$url_base='http://www.foxsports.com.au';
$html = file_get_html($url);
/*foreach($html->find('div#yui-main') as $main)
	foreach($main->find('div.yom-recent-live-upcoming ul li.live div.bd') as $ul)
		file_put_contents(dirname(__FILE__).'/live.txt', $ul->innertext);*/
$i=0;
$list=array();
$menu='</table><div id="ajaxmenu"><li link="All" class="resultmenu"><a>All</a></li>';
foreach($html->find('table.cricket-results-table tr') as $main)
	{
		
		$tablewidth=$main->getAttribute('class'); 
		if($tablewidth=='header')
		{
			//$i++;
			//file_put_contents(dirname(__FILE__).'/result.htm', "<table>");
			//continue;
		}
		foreach($main->find('td.cricket-res-table-comp') as $td)
			{
				//to remove match type ODD
				$td_txt = $td->innertext;
				if($td_txt=='ODD' || $td_txt=='SHEF')
				{
					$main->outertext='';
				//	$main->outertext
				}
				else
				{
					$main->setAttribute('class',$td_txt.' type');
					if(!in_array($td_txt,$list))
					{
						$menu=$menu.'<li class="resultmenu" link="'.$td_txt.'"><a>'.$td_txt.'</a></li>';
						$list[]=$td_txt;
					}
				}
				
			}
		foreach($main->find('td.cricket-res-table-venue a') as $link)
			{
				$href=$link->getAttribute('href'); 
				$link->setAttribute('href',$url_base.$href);
				$link->setAttribute('target','_blank'); 
			}
		if($i==0)
			{
				file_put_contents(dirname(__FILE__).'/result.txt', '<table>'.$main->outertext);
			}
		else
			{	
				file_put_contents(dirname(__FILE__).'/result.txt', $main->outertext, FILE_APPEND);
			}
		$i++;
	}
	file_put_contents(dirname(__FILE__).'/result.txt', $menu.'</div>', FILE_APPEND);

}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live score	 failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}

?>
