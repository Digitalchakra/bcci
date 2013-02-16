<?php
class Rankmodel extends CI_Model
{
	function getTeamRank($limit, $start)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'test')->get('tbl_team_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'odi')->get('tbl_team_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 't20')->get('tbl_team_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
				
				
			}
				return $data;
	}
	function getBatsman($limit, $start)
	{
		$data=array();
		$qry = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'batting')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getBowler($limit, $start)
	{
		$data=array();
		$qry = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getAllRounder($limit, $start)
	{
		$qry = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'test')->get('tbl_player_rank');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data['Test'][]=$row;
				}
			}
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'odi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 't20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
function getBatswomen($limit, $start)
	{
		$data=array();
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'womenodi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'batting')->where('match', 'woment20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getBowlerwomen($limit, $start)
	{
		$data=array();
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'womenodi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'bowling')->where('match', 'woment20')->get('tbl_player_rank');
		if($qry2->num_rows()>0)
			{
				foreach($qry2->result() as $row)
				{
					$data['T20'][]=$row;
				}
			}
			return $data;
	}
	function getAllrounderwomen($limit, $start)
	{
		$data=array();
			$qry1 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'womenodi')->get('tbl_player_rank');
		if($qry1->num_rows()>0)
			{
				foreach($qry1->result() as $row)
				{
					$data['ODI'][]=$row;
				}
			}
			$qry2 = $this->db->limit($limit, $start)->order_by("rating", "desc")->where('type', 'all-rounder')->where('match', 'woment20')->get('tbl_player_rank');
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
