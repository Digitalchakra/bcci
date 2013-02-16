<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_team_rank extends ActiveRecord\Model{
	static $table_name = 'tbl_team_rank';
	}
	$log_title = "BCCI TEAM CRON ";
try
{
$url='http://www.espncricinfo.com/rankings/content/page/211271.html';
#$url_base='http://cricket.yahoo.com';
if($html = file_get_html($url))
{
$type=array();
$result=array();
	foreach($html->find('div#ciHomeContentlhs div.ciPhotoContainer') as $main)
	{
		foreach($main->find('h3') as $h3)
		{
			if(trim($h3->plaintext)=='ICC Test Championship')
			{
				$type[] ='test';
			}
			else if(trim($h3->plaintext)=='ICC ODI Championship')
			{
				$type[]='odi';
			}
			else if(trim($h3->plaintext)=='ICC Twenty20 Championship')
			{
				$type[]='t20';
			}
		}
		$typecount = 0;
		foreach($main->find('table') as $table)
		{
			$rowcount=0;
			foreach($table->find('tr') as $tr)
			{
				$tdcount=0;
				if($tr->getAttribute('class')=='head')
				{
					continue;
				}
				foreach($tr->find('td') as $td)
				{
					$result[$typecount][$rowcount][$tdcount]=$td->plaintext;
					$tdcount++;
				}
				$rowcount++;
			}
			$typecount++;
		}
	}
	if(count($type) != count($result))
	{
		notify($log_title,'Invalid record in  TEAM URL');
	}
	else
	{
	
		if(Tbl_team_rank::connection()->query('TRUNCATE TABLE `tbl_team_rank`'))
		{
			$i=0;
		foreach($result as $type_row)
		{
			foreach($type_row as $row)
			{
				$inserval['team']=$row[0];
				$country_list=array('ENG'=>'England',
								'AUS'=>'Australia',
								'BAN'=>'Bangladesh',
								'IND'=>'India',
								'NZ'=>'New Zealand',
								'PAK'=>'Pakistan',
								'SA'=>'South Africa',
								'SL'=>'Sri Lanka',
								'WI'=>'West Indies',
								'ZIM'=>'Zimbabwe',
								'AFG'=>'Afghanistan',
								'ARG'=>'Argentina',
								'BER'=>'Bermuda',
								'CAN'=>'Canada',
								'KEN'=>'Kenya',
								'AUC'=>'Auckland Aces',
								'EA'=>'East Africa',
								'HAM'=>'Hampshire',
								'HK'=>'Hong Kong',
								'IRE'=>'Ireland',
								'NAM'=>'Namibia',
								'NET'=>'Netherlands'				
				);
				//if(stripos($row[0], 'india') ||strtolower($row[0])=='india')
				if($key=array_search($row[0],$country_list))
				{
					$country_code=$key;
				}
				else
				{
					$country_code='DEF';
				}
				$inserval['matches']=$row[1];
				$inserval['points']=$row[2];
				$inserval['rating']=$row[3];
				$inserval['type']=$type[$i];
				$inserval['country_code']=$country_code;
				Tbl_team_rank::create($inserval);				
				////////
			}
			$i++; 
		}
		}
		//db
	}
}
else
{
	notify($log_title,'failed to read the TEAM URL');
}

}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
?>
