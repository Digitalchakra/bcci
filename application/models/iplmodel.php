<?php
class Iplmodel extends CI_Model
{
	function getPoints($limit, $start)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("position", "asc")->get('ipl_team_ranks');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function mostRun()	
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("r", "desc")->get('ipl_most_runs');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function mostSix()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("6s", "desc")->get('ipl_most_sixes');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function highestScore()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("hs", "desc")->get('ipl_highest_scores');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function highestStrikeRate()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("sr", "desc")->get('ipl_highest_strikerates');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function mostWicket()	
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("w", "desc")->get('ipl_most_wickets');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function bestBowling()	
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->get('ipl_best_bowlings');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function bestBowlingAvg()	
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("a", "asc")->get('ipl_bowling_avgs');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function bestBowlingEconomy()	
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->order_by("e", "asc")->get('ipl_bowling_economies');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	
}
