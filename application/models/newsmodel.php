<?php
class Newsmodel extends CI_Model
{
	function getNews($limit, $start)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		//$qry3=$this->db->limit($limit, $start)->where('utc_time >', $today_end)->get('tbl_matches');
		$qry = $this->db->limit($limit, $start)->get('tbl_news');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function recordCount()
	{
		$this->db->from('tbl_news');
		return $this->db->count_all_results();
	}
	
}
