<?php
class Rankmodel extends CI_Model
{
	function getTeamRank()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'test')->get('tbl_team_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'odi')->get('tbl_team_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 't20')->get('tbl_team_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
				
				
			}
				return $data;
	}
	function getBatsman()
	{
		$data=array();
		$qry = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'batting')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getBowler()
	{
		$data=array();
		$qry = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getAllRounder()
	{
		$qry = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
}
