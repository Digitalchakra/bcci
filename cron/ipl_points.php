<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Ipl_team_ranks extends ActiveRecord\Model { }
$log_title = "IPL POINTS CRON ";
try
	{
		$jsonurl = "http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/groupStandings.js?_".time();
		$json = file_get_contents($jsonurl);
		$json =strstr($json, '{');
		$json = substr($json, 0, -2);
		$json_output = json_decode($json);
		$data = array();
		$data_list = array();
		foreach ($json_output->groups[0]->standings as $single) {
			$matchend="";
			$data['position']=$single->position;
			$data['points']=$single->team->type;
			$data['netRunRate']=$single->netRunRate;
			$data['played']=$single->played;
			$data['won']=$single->won;
			$data['lost']=$single->lost;
			$data['tied']=$single->tied;
			$data['type']=$single->team->type;
			$data['team_id']=$single->team->id;
			$data['fullName']=$single->team->fullName;
			$data['abbreviation']=$single->team->abbreviation;
			$data['primaryColor']=$single->team->primaryColor;
			$data['noResult']=$single->noResult;
			foreach($single->recentForm as $recentForm)
			{
				$matchend=$matchend.$recentForm->outcome.",";
			}
			$data['recentForm']=$matchend;
			//print_r($data);
			$data_list[]=$data;
		}
		//print_r($data_list);
		//db insertion
		if(count($data_list)>0)
		{
			
			//Tbl_photo::connection()->query('TRUNCATE TABLE `Tbl_photo`');
			foreach($data_list as $row)
			{
				$find=array('team_id'=>$row['team_id']);
					if($found = Ipl_team_ranks::find($find))
					{
						foreach($row as $key=>$value)
						{
							$found->$key = $value;
						}
						$found->save();
					}
					else
					{
						Ipl_team_ranks::create($row);
					}
			}
		}
	}
	catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
?>