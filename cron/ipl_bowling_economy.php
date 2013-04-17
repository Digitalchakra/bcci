<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Ipl_bowling_economies extends ActiveRecord\Model { }
$log_title = "IPL BEST BOWLING AVG CRON ";
try
	{

		//runs and sixes statitics
		$json_output=array();
		$data_list=array();
		$jsonurl = "http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/stats/player/full/bestBowlingEconomy.js?_".time();
		$json = file_get_contents($jsonurl);
		$json =strstr($json, '{');
		$json = substr($json, 0, -2);
		$json_output = json_decode($json,true);
		echo "<pre>"; 
		//print_r($json_output); die;
		foreach ($json_output['bestEconomy'][0]['topPlayers'] as $single) {
			$data['pid']=$single['player']['id'];
			$data['pfullName']=$single['player']['fullName'];
			$data['pdob']=$single['player']['dateOfBirth'];
			$data['nationality']=$single['player']['nationality'];
			$data['a']=$single['bowlingStats']['a'];
			$data['b']=$single['bowlingStats']['b'];
			$data['r']=$single['bowlingStats']['r'];
			$data['sr']=$single['bowlingStats']['sr'];
			$data['4s']=$single['bowlingStats']['4s'];
			$data['6s']=$single['bowlingStats']['6s'];
			$data['ov']=$single['bowlingStats']['ov'];
			$data['e']=$single['bowlingStats']['e'];
			$data['wb']=$single['bowlingStats']['wb'];
			$data['nb']=$single['bowlingStats']['nb'];
			$data['inns']=$single['bowlingStats']['inns'];
			$data['d']=$single['bowlingStats']['d'];
			$data['w']=$single['bowlingStats']['w'];
			$data['bbiw']=$single['bowlingStats']['bbiw'];
			$data['bbir']=$single['bowlingStats']['bbir'];
			$data['bbmw']=$single['bowlingStats']['bbmw'];
			$data['bbmr']=$single['bowlingStats']['bbmr'];
			$data['4w']=$single['bowlingStats']['4w'];
			$data['5w']=$single['bowlingStats']['5w'];
			$data['10w']=$single['bowlingStats']['10w'];
			$data['maid']=$single['bowlingStats']['maid'];
			$data['wmaid']=$single['bowlingStats']['wmaid'];
			$data['team_id']=$single['team']['id'];
			$data_list[]=$data;
		}
		//print_r($data_list); die;
		//db insertion
		if(count($data_list)>0)
		{
			
			Ipl_bowling_economies::connection()->query('TRUNCATE TABLE `ipl_bowling_economies`');
			foreach($data_list as $row)
			{
						Ipl_bowling_economies::create($row);
			}
		}
	}
	catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
?>
