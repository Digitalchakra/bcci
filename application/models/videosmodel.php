<?php
class Videosmodel extends CI_Model
{
	function getVideos()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit(8)->get('tbl_videos');
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
