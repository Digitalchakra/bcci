<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_matches extends ActiveRecord\Model { }
$log_title = "BCCI SHEDULE CRON ";
try
	{	
	$xmlDoc = new DOMDocument();
	if(!$xmlDoc->load( 'http://synd.cricbuzz.com/j2me/1.0/sch_calender.xml'))
	{
		notify($log_title,'failed to read the SCHEDULE URL');
	}
	if($search = $xmlDoc->getElementsByTagName( "mch" ))
	{
	foreach($search as $searchNode )
	{
		$srs_arr = explode(',',$searchNode->getAttribute('srs'));
		$sdate = explode('-',$searchNode->getAttribute('ddt'));
	//	$values = $srs_arr[0].",".$srs_arr[1].",".$searchNode->getAttribute('desc').",".preg_replace("/[^0-9]/","",$searchNode->getAttribute('ddt'))."-".str_replace(",","-",$searchNode->getAttribute("mnth_yr"))."".$searchNode->getAttribute('tm').",".strtotime($data[$i]["mch_date"].":00").",".$searchNode->getAttribute('vnu')";
		$srs_arr = explode(',',$searchNode->getAttribute('srs'));
		$tm='00:00';
		if($searchNode->getAttribute('tm') !='-')
		{
			$tm=$searchNode->getAttribute('tm');	
		}
		$data['srs_id']=$srs_arr[0];
		$data['srs_name']=$srs_arr[1];
		$data['description']=$searchNode->getAttribute('desc');
		$data['date']=preg_replace("/[^0-9]/","",$sdate[0]).'-'.str_replace(',','-',$searchNode->getAttribute('mnth_yr')).''.$tm;
		$data['utc_time']=strtotime($data['date'].':00');
		$data['mt_vnu']=$searchNode->getAttribute('vnu');
		$values= implode(',',$data);
		//print_r($data); die;

					$find=array('srs_id'=>$data['srs_id'],'description'=>$data['description']);
					if($found = Tbl_matches::find($find))
					{
						$found->create($data);
					}
					else
					{
						Tbl_matches::create($data);
					}

	}
	}
	}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}


?>
