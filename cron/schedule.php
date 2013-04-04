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
		if(!isset($sdate[1]))
		{
			$sdate[1]=$sdate[0];
		}
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
		$data['sdate']=preg_replace("/[^0-9]/","",$sdate[0]).'-'.str_replace(',','-',$searchNode->getAttribute('mnth_yr'));
		$data['edate']=preg_replace("/[^0-9]/","",$sdate[1]).'-'.str_replace(',','-',$searchNode->getAttribute('mnth_yr'));
		$data['time']=$tm;
		$data['sutc_time']=strtotime($data['sdate'].' '.$tm.':00');
		$data['eutc_time']=strtotime($data['edate'].' 23:59:00');
		$data['mt_vnu']=$searchNode->getAttribute('vnu');
		if($data['srs_id']=='2170')
		{
			$search  = array('KOL', 'DEL', 'BLR', 'MUM', 'HYD', 'PUNE', 'JAI', 'CHN' ,'MOH');
			$replace = array('KKR', 'DD', 'RCB', 'MI', 'SH', 'PWI', 'RR', 'CSK' ,'KXIP');
			$data['description']=str_ireplace($search, $replace, $data['description']);
			$data['srs_name']='Indian Premier League VI 2013';
		}
		//$values= implode(',',$data);
		//print_r($data); //die;

					$find=array('srs_id'=>$data['srs_id'],'description'=>$data['description']);
					if($found = Tbl_matches::find($find))
					{
						$found->update_attributes($data);
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
