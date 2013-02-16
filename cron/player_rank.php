<?php
ini_set('set_time_limit', 0);
include('exception.php');
require('db.php');	
include('simple_html_dom.php');
$log_title = "BCCI PLAYER CRON ";
class Tbl_player_rank extends ActiveRecord\Model{
	static $table_name = 'tbl_player_rank';
	}
$url_list = array();
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/test/batting/','test','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/test/bowling/','test','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/test/all-rounder/','test','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/odi/batting/','odi','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/odi/bowling/','odi','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/odi/all-rounder/','odi','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/t20/batting/','t20','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/t20/bowling/','t20','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/t20/all-rounder/','t20','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/womenodi/batting/','womenodi','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/womenodi/bowling/','womenodi','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/womenodi/all-rounder/','womenodi','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/woment20/batting/','woment20','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/woment20/bowling/','woment20','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/ranking/woment20/all-rounder/','woment20','all-rounder');
/*$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/test/batting/','test','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/test/bowling/','test','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/test/all-rounder/','test','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/odi/batting/','odi','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/odi/bowling/','odi','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/odi/all-rounder/','odi','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/t20/batting/','t20','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/t20/bowling/','t20','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/t20/all-rounder/','t20','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/womenodi/batting/','womenodi','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/womenodi/bowling/','womenodi','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/womenodi/all-rounder/','womenodi','all-rounder');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/woment20/batting/','woment20','batting');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/woment20/bowling/','woment20','bowling');
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/woment20/all-rounder/','woment20','all-rounder');*/

//insert_player_rate($url,$match,$type);
		if(Tbl_player_rank::connection()->query('TRUNCATE TABLE `tbl_player_rank`'))
		{
			foreach($url_list as $single)
			{
				//echo "Reading => ".$single[0];
				insert_player_rate($single[0],$single[1],$single[2]);
			}
		}
	else
		{
		}

function insert_player_rate($url,$match,$type)
{
try
{
$log_title = "BCCI PLAYER CRON ";
if($html = file_get_html($url))
{
$result=array();
$rowcount = 0;
	foreach($html->find('div.#top100wrapperright tr') as $tr)
	{
			if(1)
			{
				$tdcount=0;
				foreach($tr->find('td') as $td)
				{
					if($tdcount==3)
					{
					$result[$rowcount][$tdcount]=$td->getAttribute('title');;
					}
					else
					{
					$result[$rowcount][$tdcount]=$td->plaintext;
					}
					$tdcount++;
				}
			}
			$rowcount++;
		
	}

//echo "<pre>";
//	print_r($result); die;
unset($result[0]);
	if(count($result)<=0)
	{
		notify($log_title,'COLUM MISS MATCH in team rating cron');
	}
	else
	{
			foreach($result as $row)
			{
				if(count($row))
				{
				$inserval['rank']=$row[0];
				$inserval['name']=$row[2];
				$inserval['country']=$row[3];
				$inserval['rating']=$row[1];
				$inserval['match']=$match;
				$inserval['type']=$type;
				$inserval['detail']=$row[4];
				Tbl_player_rank::create($inserval);
				}
			}

		//db
	}
}
else
{
	notify($log_title,'failed to read the PLAYER URL');
}

}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
}

/*
function insert_player_rate($url,$match,$type)
{
try
{
$log_title = "BCCI PLAYER CRON ";
if($html = file_get_html($url))
{
$result=array();
	foreach($html->find('table.ratingstable') as $main)
	{
		$rowcount = 0;
		foreach($main->find('tr') as $tr)
		{
			$tdcount=0;
			if($tr->getAttribute('class')=='rankings')
			{
				foreach($tr->find('td') as $td)
				{
					$result[$rowcount][$tdcount]=$td->plaintext;
					$tdcount++;
				}
			}
			$rowcount++;
		}
	}
	if(count($result)<=0)
	{
		notify($log_title,'COLUM MISS MATCH in team rating cron');
	}
	else
	{
			foreach($result as $row)
			{
				
				$inserval['rank']=$row[0];
				$inserval['name']=$row[1];
				$inserval['country']=$row[2];
				$inserval['rating']=$row[3];
				$inserval['match']=$match;
				$inserval['type']=$type;
				Tbl_player_rank::create($inserval);
			}

		//db
	}
}
else
{
	notify($log_title,'failed to read the PLAYER URL');
}

}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
}*/
?>
