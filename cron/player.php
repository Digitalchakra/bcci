<?php
ini_set('set_time_limit', 0);
require('db.php');	
include('simple_html_dom.php');
$url_list = array();
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/test/batting/','test','batting');
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
$url_list[]=array('http://www.reliancemobileiccrankings.com/feed/woment20/all-rounder/','woment20','all-rounder');
/*
http://www.reliancemobileiccrankings.com/feed/test/batting/
http://www.reliancemobileiccrankings.com/feed/test/bowling/
http://www.reliancemobileiccrankings.com/feed/test/all-rounder/
http://www.reliancemobileiccrankings.com/feed/odi/batting/
http://www.reliancemobileiccrankings.com/feed/odi/bowling/
http://www.reliancemobileiccrankings.com/feed/odi/all-rounder/
http://www.reliancemobileiccrankings.com/feed/t20/batting/
http://www.reliancemobileiccrankings.com/feed/t20/bowling/
http://www.reliancemobileiccrankings.com/feed/t20/all-rounder/
http://www.reliancemobileiccrankings.com/feed/womenodi/batting/
http://www.reliancemobileiccrankings.com/feed/womenodi/bowling/
http://www.reliancemobileiccrankings.com/feed/womenodi/all-rounder/
http://www.reliancemobileiccrankings.com/feed/woment20/batting/
http://www.reliancemobileiccrankings.com/feed/woment20/bowling/
http://www.reliancemobileiccrankings.com/feed/woment20/all-rounder/
*/
//insert_player_rate($url,$match,$type);
$query='TRUNCATE TABLE `tbl_player_rank`';
		if(mysql_query($query))
		{
			foreach($url_list as $single)
			{
				echo "Reading => ".$single[0];
				insert_player_rate($single[0],$single[1],$single[2]);
			}
		}
	else
		{
			$error_msg="Table truncate failed in team rank cron job @ BCCI";
			echo $error_msg;
			error_log($error_msg, 3,dirname(__FILE__).'/error.log');
}
function insert_player_rate($url,$match,$type)
{
try
{
#$url='http://www.espncricinfo.com/rankings/content/page/211270.html';
#$url_base='http://cricket.yahoo.com';
$html = file_get_html($url);
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
		$error_msg="COLUM MISS MATCH in team rating cron";
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}
	else
	{
			foreach($result as $row)
			{
					$query='INSERT INTO `tbl_player_rank` (`rank`, `name`, `country`, `rating`, `match`,`type`) VALUES ("'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$match.'","'.$type.'")';
					
					if(!mysql_query($query))
					{
						echo $query; die; 
						echo "Failed";
						$error_msg="Record Insertion failed in team rank cron job @ BCCI";
						error_log($error_msg, 3,dirname(__FILE__).'/error.log');
					}
			}

		//db
	}

}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read team failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}
}
?>
