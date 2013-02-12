<?php
include('simple_html_dom.php');
try
{
$url='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/filter-match-details.json?'.time();
//echo "<pre>";
$match_list=json_decode(file_get_contents($url));
//print_r($match_list); die;
$matchs=array();
foreach($match_list as $match)
{
	if($match->matchDataType == 'Live Data')
	{
		//x$matchs['live'][]=array('name'=>$match->seriesFolder,'status'=>$match->status,'series'=>$match->series);
		$matchs['live'][]=$match;
	}
	elseif($match->matchDataType == 'Fixture')
	{
		//$matchs['fixture'][]['name']=array('name'=>$match->seriesFolder,'status'=>$match->status,'series'=>$match->series);
		$matchs['fixture'][]['name']=$match;
	}
	elseif($match->matchDataType == 'Result')
	{
		//$matchs['result'][]['name']=array('name'=>$match->seriesFolder,'status'=>$match->status,'series'=>$match->series);
		$matchs['result'][]['name']=$match;
	}
}
//print_r($matchs);
file_put_contents(dirname(__FILE__).'/live.json', json_encode($matchs));
die;
/*$html = file_get_html($url);

foreach($html->find('div#yui-main div.ycric-body-left li.ycric-livescore-sprite') as $main)
	{
		
		$main->setAttribute('class','padding20');
		$main->setAttribute('class','wired');
		foreach($main->find('div.links a') as $link)
			{
				$href=$link->getAttribute('href'); 
				$link->setAttribute('href',$url_base.$href);
				$link->setAttribute('target','_blank'); 
			}
				file_put_contents(dirname(__FILE__).'/live.txt', $main->outertext, FILE_APPEND);

	}
	*/
}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live score	 failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}
?>
