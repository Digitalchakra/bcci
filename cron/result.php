<?php
include('exception.php');
include('simple_html_dom.php');
require('db.php');
class Tbl_results extends ActiveRecord\Model { }
$log_title = "BCCI RESULT CRON ";
try
{
$url='http://www.foxsports.com.au/cricket/results';
$url_base='http://www.foxsports.com.au';
if($html = file_get_html($url))
{
$i=-1;
$line=array();
foreach($html->find('table.cricket-results-table tr') as $main)
	{
		$skiploop=0;
		$list=array();
		foreach($main->find('td') as $td)
			{
				if(!$skiploop)
				{
				$td_txt = $td->plaintext;
				if($td->getAttribute('class')=='cricket-res-table-comp')
				{
					if($td_txt!='ODD' && $td_txt!='SHEF')
					{
						$list['type'] = $td_txt;
					}
					else
					{
						$skiploop=1;
					}
				}
				else if($td->getAttribute('class')=='cricket-res-table-date')
				{
					$list['date'] = trim($td_txt);
					if($list['date']=='live')
					$list['date'] = 'LIVE';
				}
				else if($td->getAttribute('class')=='cricket-res-table-teams')
				{
					$list['team'] = $td_txt;
				}
				else
				{
				$list['result'] = $td_txt;
				foreach($td->find('a') as $link)
					{
						$href=$link->getAttribute('href');
						$list['match_id']=end( explode( 'matchid=', substr($href,strpos( $href, 'matchid')) ) ); 
						$list['link'] = $url_base.$href;
					}
				}
			}				
			}
			$line[]=$list;
	}
	
		if(count($line)>0)
		{
			foreach($line as $row)
			{
				if(count($row)>0)
				{
				$find=array('match_id'=>$row['match_id']);
					if($found = Tbl_results::find($find))
					{
						//unset($row['match_id']);
						$found->update_attributes($row);
					}
					else
					{
						Tbl_results::create($row);
					}
				}
			}
		}
		else
		{
			notify($log_title,'empty records in RESULT URL');
		}
	}
	else
	{
		notify($log_title,'failed to read the RESUTL URL');
	}

}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}

?>
