<?php
class Resultmodel extends CI_Model
{
	function getResult($limit, $start)
	{
		$data['ODI']=array();
		$data['T20']=array();
		$data['Test']=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		//$qry3=$this->db->limit($limit, $start)->where('utc_time >', $today_end)->get('tbl_matches');
		$qry = $this->db->limit($limit, $start)->order_by("match_id", "desc")->where('type','ODI')->get('tbl_results');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry = $this->db->limit($limit, $start)->order_by("match_id", "desc")->where('type','T20')->get('tbl_results');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			$qry = $this->db->limit($limit, $start)->order_by("match_id", "desc")->where('type','Test')->get('tbl_results');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
				return $data;
	}
	function getResults($limit, $start, $type)
	{
		$data=array();
		$qry = $this->db->limit($limit, $start)->order_by("match_id", "desc")->where('type',$type)->get('tbl_results');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function recordCount($type)
	{
		$this->db->from('tbl_results');
		$this->db->where('type',$type);
		return $this->db->count_all_results();
	}
	
}
