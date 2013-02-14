<?php
class Match extends CI_Model
{
	function recordCountUpcoming($today_end, $srs_id)
	{
		$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
		$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
		$this->db->where('utc_time >', $today_end);
		$this->db->where('srs_id',$srs_id);
		$this->db->from('tbl_matches');
		return $this->db->count_all_results();
	}
	function getMatchs($limit, $start)
		{
			$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
			$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
			$qry1=$this->db->limit($limit, $start)->where('utc_time <', $today_start)->order_by('utc_time', 'desc')->get('tbl_matches');
			//$this->db->flush_cache();
			$qry2=$this->db->where('utc_time >', $today_start)->where('utc_time <', $today_end)->order_by('utc_time', 'asc')->get('tbl_matches');
			//$this->db->flush_cache();
			$qry3=$this->db->limit($limit, $start)->where('utc_time >', $today_end)->order_by('utc_time', 'asc')->get('tbl_matches');
			if($qry1->num_rows()>0)
			{
				$data=array();
				foreach($qry1->result() as $row)
				{
					$data[]=$row;
				}
				$result['past']=$data;
			}
			else
			{
				$result['past']=NULL;
			}
			if($qry2->num_rows()>0)
			{
				$data=array();
				foreach($qry2->result() as $row)
				{
					$data[]=$row;
				}
				$result['present']=$data;
			}
			else
			{
				$result['present']=NULL;
			}
			if($qry3->num_rows()>0)
			{
				$data=array();
				foreach($qry3->result() as $row)
				{
					$data[]=$row;
				}
				$result['upcoming']=$data;
			}
			else
			{
				$result['upcoming']=NULL;
			}
			return $result;
		}
		function getUpcomingMatch($limit, $start, $srs_id)
		{
			$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
			$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
			$qry2=$this->db->limit($limit, $start)->where('utc_time >', $today_end)->where('srs_id',$srs_id)->order_by('utc_time', 'asc')->get('tbl_matches');
			if($qry2->num_rows()>0)
			{
				$data=array();
				foreach($qry2->result() as $row)
				{
					$data[]=$row;
				}
				$result['upcoming']=$data;
			}
			else
			{
				$result['upcoming']=NULL;
			}
			return $result;
		}
		function getUpcomingSrs($today_end,$limit=NULL)
		{
			if($limit)
			{
				$qry1=$this->db->limit($limit)->group_by('srs_id')->where('utc_time >', $today_end)->order_by('utc_time', 'asc')->get('tbl_matches');
			}
			else
			{
			$qry1=$this->db->group_by('srs_id')->where('utc_time >', $today_end)->order_by('utc_time', 'asc')->get('tbl_matches');
			}
			if($qry1->num_rows()>0)
			{
				$data=array();
				foreach($qry1->result() as $row)
				{
					$data[]=$row;
				}
			}
			return $data;
		}
}
?>
