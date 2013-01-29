<?php
require('db.php');
try
	{	
	$xmlDoc = new DOMDocument();
	$xmlDoc->load( 'http://synd.cricbuzz.com/j2me/1.0/sch_calender.xml');
	$search = $xmlDoc->getElementsByTagName( "mch" );
	}
catch (Exception $e)
	{
		$error_msg="Cron: Read shedule xml failed @ BCCI";
		error_log($error_msg, 1,"manimani1014@gmail.com");
	}

foreach( $search as $searchNode )
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
	$data['mid']=$srs_arr[0];
	$data['name']=$srs_arr[1];
	$data['description']=$searchNode->getAttribute('desc');
	$data['date']=preg_replace("/[^0-9]/","",$sdate[0]).'-'.str_replace(',','-',$searchNode->getAttribute('mnth_yr')).''.$tm;
	$data['utc_time']=strtotime($data['date'].':00');
  	$data['mt_vnu']=$searchNode->getAttribute('vnu');
  	$values= implode(',',$data);
  	$query='SELECT mid FROM `tbl_matches` WHERE `mid`='.$data['mid'].' and `description`="'.$data['description'].'"';
  	$result=mysql_query($query);

  	if(mysql_numrows($result) <1)
	{
		$query='INSERT INTO `tbl_matches` (`mid`, `srs_name`, `description`, `date`, `utc_time`, `mt_vnu`) VALUES ("'.$data['mid'].'","'.$data['name'].'","'.$data['description'].'","'.$data['date'].'","'.$data['utc_time'].'","'.$data['mt_vnu'].'")';
		if(!mysql_query($query))
		{
			echo "Failed";
			$error_msg="Record Insertion failed in cron job @ BCCI";
			error_log($error_msg, 1,"manimani1014@gmail.com");
		}
	}
	else
	{
		$query='UPDATE table_name SET name="'.$data['srs_name'].'", date="'.$data['date'].'", utc_time="'.$data['utc_time'].'", mt_vnu="'.$data['mt_vnu'].'" WHERE `mid`='.$data['mid'].' and `description`="'.$data['description'].'"';
		mysql_query($query);
	}
}
?>
