<?php
class Match extends CI_Model
{
	function record_count()
	{
		//$this->db->like('title', 'match');
		$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
		$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
		$this->db->where('utc_time <', 1359397860);
		$this->db->from('tbl_matches');
		return $this->db->count_all_results();
		//return $this->db->count_all("tbl_matches");
	}
	function getSchedule($limit, $start)
		{
			$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
			$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
			$qry1=$this->db->where('utc_time <', $today_start)->get('tbl_matches');
			//$this->db->flush_cache();
			$qry2=$this->db->where('utc_time >', $today_start)->where('utc_time <', $today_end)->get('tbl_matches');
			//$this->db->flush_cache();
			$qry3=$this->db->where('utc_time >', $today_end)->get('tbl_matches');
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
		function getScheduleJson($limit, $start)
		{
			$today_start =  strtotime(date('d-M-Y',time()).' 00:01');
			$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
			//echo "select * from tbl_matches where 'utc_time' < $today_start ORDER BY utc_time DESC"."||".$today_end; die;
			$this->db->limit($limit, $start);
			$qry1 = $this->db->get('tbl_matches');
			$qry2 = $this->db->query("select * from tbl_matches where 'utc_time' > $today_start AND 'utc_time' < $today_end ORDER BY utc_time DESC");
			$qry3 = $this->db->query("select * from tbl_matches where 'utc_time' > $today_end ORDER BY utc_time DESC");
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
}
?>
