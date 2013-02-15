<?php
class Videosmodel extends CI_Model
{
	function getVideos($limit, $start)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit($limit, $start)->order_by("video_id", "desc")->get('tbl_videos');
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
		$this->db->from('tbl_videos');
		return $this->db->count_all_results();
	}
	
}
