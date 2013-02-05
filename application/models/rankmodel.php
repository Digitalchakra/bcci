<?php
class Rankmodel extends CI_Model
{
	function getTeamRank()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'Test')->get('tbl_team_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'ODI')->get('tbl_team_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit(3)->order_by("rating", "desc")->where('type', 'Twenty20')->get('tbl_team_rank');
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
		$this->db->where('type', 'batting');
		$this->db->from('tbl_player_rank');
		$qry = $this->db->get();
		if($qry->num_rows()>0)
			{
				$data=array();
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
				return $data;
			}
	}
	function getBowler()
	{
		$this->db->where('type', 'bowling');
		$this->db->from('tbl_player_rank');
		$qry = $this->db->get();
		if($qry->num_rows()>0)
			{
				$data=array();
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
				return $data;
			}
	}
	function getAllRounder()
	{
		$this->db->where('type', 'all-rounder');
		$this->db->from('tbl_player_rank');
		$qry = $this->db->get();
		if($qry->num_rows()>0)
			{
				$data=array();
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
				return $data;
			}
	}
}
