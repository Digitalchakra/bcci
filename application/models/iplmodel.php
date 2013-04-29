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
	function mostRun($pids=NULL)	
	{
		$data=array();
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		if($pids)
		{
			$this->db->where('pid', $pids);
		}
		//$this->db->where('r >', 0);
		$qry = $this->db->order_by("r", "desc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('6s >', 0);
		$qry = $this->db->order_by("6s", "desc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('hs >', 0);
		$qry = $this->db->order_by("hs", "desc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('sr >', 0);
		$qry = $this->db->order_by("sr", "desc")->get('ipl_players_stats');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function mostWicket($pids=NULL)	
	{
		$data=array();
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		if($pids)
		{
			$this->db->where('pid', $pids);
		}
		$qry = $this->db->order_by("w", "desc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('w >', 0);
		$qry = $this->db->order_by("bbiw", "desc")->order_by("bbir", "asc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('ba >', 0);
		$qry = $this->db->order_by("ba", "asc")->get('ipl_players_stats');
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
		$this->db->select('ipl_players_stats.* , ipl_team_ranks.fullName AS team_fullName, ipl_team_ranks.abbreviation AS team_abbreviation');
		$this->db->join('ipl_team_ranks', 'ipl_team_ranks.team_id = ipl_players_stats.team_id');
		$this->db->where('e >', 0);
		$qry = $this->db->order_by("e", "asc")->get('ipl_players_stats');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function getPlayersList()
	{
		$data=array();
		$this->db->select('pid,pfullName');
		$qry = $this->db->get('ipl_players_stats');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function getPlayers($pids)
	{
		$data=array();
		$this->db->select('*');
		$this->db->where_in('pid', $pids);
		$orderby=trim(implode(',', $pids), ",");
		$this->db->_protect_identifiers = FALSE;
		$this->db->order_by('FIELD ( pid, '.$orderby.' )');
		$this->db->_protect_identifiers = TRUE;
		$qry = $this->db->get('ipl_players_stats');
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
