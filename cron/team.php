<?php
require('db.php');	
include('simple_html_dom.php');
try
{
$url='http://www.espncricinfo.com/rankings/content/page/211271.html';
#$url_base='http://cricket.yahoo.com';
$html = file_get_html($url);
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
		$error_msg="COLUM MISS MATCH in team rating cron";
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}
	else
	{
		$query='TRUNCATE TABLE `tbl_team_rank`';
		if(mysql_query($query))
		{
			$i=0;
		foreach($result as $type_row)
		{
			foreach($type_row as $row)
			{
					$query='INSERT INTO `tbl_team_rank` (`team`, `matches`, `points`, `rating`, `type`) VALUES ("'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$type[$i].'")';
					if(!mysql_query($query))
					{
						echo "Failed";
						$error_msg="Record Insertion failed in team rank cron job @ BCCI";
						error_log($error_msg, 3,dirname(__FILE__).'/error.log');
					}
				
				////////
			}
			$i++; 
		}
		}
	else
		{
			$error_msg="Table truncate failed in team rank cron job @ BCCI";
			error_log($error_msg, 3,dirname(__FILE__).'/error.log');
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
/////////////////////////////////
/*
include('simple_html_dom.php');
try
{
#$url='http://cricket.yahoo.com/cricket/teams/home';
$url='http://www.icc-cricket.com/';
#$url_base='http://cricket.yahoo.com';
$html = file_get_html($url);
file_put_contents(dirname(__FILE__).'/team.txt', '');
file_put_contents(dirname(__FILE__).'/player.txt', '');
foreach($html->find('div.pageBody') as $main)
{
	foreach($main->find('div.left div.releanceTabBox') as $team)
	{
		//get team ranking
		foreach($team->find('ul li') as $list)
	{
		$list->removeAttribute('onclick');
		$list->setAttribute('link',$list->innertext);
		if($list->getAttribute('class')=='sel')
		{
			$id=$list->innertext;
			$list->setAttribute('class',' sel teamMenu');
		}
		else
		{
			$list->setAttribute('class','teamMenu');
		}
	}
	$team->setAttribute('id',$id);
	file_put_contents(dirname(__FILE__).'/team.txt', $team->outertext,FILE_APPEND);
		
	}
	foreach($main->find('div.right div.releanceTabBox') as $player)
	{
		//get player rank
		foreach($player->find('div.right select') as $teamlist)
		{
			$teamlist->setAttribute('id','teamList');
		}
	file_put_contents(dirname(__FILE__).'/player.txt', $player->outertext,FILE_APPEND);
		
	}
}

}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read team failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}*/

?>
