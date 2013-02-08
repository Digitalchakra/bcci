<?php
class Articlemodel extends CI_Model
{
	function getArticles()
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->limit(5)->order_by("views", "desc")->get('tbl_articles');
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
