<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Ipl_highest_strikerates extends ActiveRecord\Model { }
$log_title = "IPL HIGHEST STRIKE RATE CRON ";
try
	{

		//runs and sixes statitics
		$json_output=array();
		$data_list=array();
		$jsonurl = "http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/stats/player/full/bestBattingStrikeRate.js?_".time();
		$json = file_get_contents($jsonurl);
		$json =strstr($json, '{');
		$json = substr($json, 0, -2);
		$json_output = json_decode($json,true);
		echo "<pre>"; 
		//print_r($json_output); die;
		foreach ($json_output['bestStrikeRate'][0]['topPlayers'] as $single) {
			if(!isset($single['battingStats']['b']))
				$single['battingStats']['b']=0;
			$data['pid']=$single['player']['id'];
			$data['pfullName']=$single['player']['fullName'];
			$data['pdob']=$single['player']['dateOfBirth'];
			$data['nationality']=$single['player']['nationality'];
			$data['a']=$single['battingStats']['a'];
			$data['b']=$single['battingStats']['b'];
			$data['r']=$single['battingStats']['r'];
			$data['sr']=$single['battingStats']['sr'];
			$data['4s']=$single['battingStats']['4s'];
			$data['6s']=$single['battingStats']['6s'];
			$data['no']=$single['battingStats']['no'];
			$data['hs']=$single['battingStats']['hs'];
			$data['50s']=$single['battingStats']['50s'];
			$data['100s']=$single['battingStats']['100s'];
			$data['inns']=$single['battingStats']['inns'];
			$data['team_id']=$single['team']['id'];
			$data_list[]=$data;
		}
		//print_r($data_list); die;
		//db insertion
		if(count($data_list)>0)
		{
			
			Ipl_highest_strikerates::connection()->query('TRUNCATE TABLE `ipl_highest_strikerates`');
			foreach($data_list as $row)
			{
						Ipl_highest_strikerates::create($row);
			}
		}
	}
	catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
?>
