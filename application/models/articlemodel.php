<?php
class Articlemodel extends CI_Model
{
	function getArticles($limit, $start)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		//$qry = $this->db->limit($limit, $start)->order_by("views", "desc")->get('tbl_articles');
		$qry = $this->db->limit($limit, $start)->order_by("created_on", "desc")->get('tbl_articles');
		if($qry->num_rows()>0)
			{
				foreach($qry->result() as $row)
				{
					$data[]=$row;
				}
			}
				return $data;
	}
	function getArticle($id)
	{
		$data=array();
		//$this->db->where('type', 'batting');
		//$this->db->from('tbl_player_rank');
		$qry = $this->db->where("id", $id)->get('tbl_articles');
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
		$this->db->from('tbl_articles');
		return $this->db->count_all_results();
	}
	function addArticle($data,$id)
	{
		$this->db->from('tbl_articles');
		if($id)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_articles', $data); 
		}
		else
		{
			$data['created_on']=time();
			$this->db->insert('tbl_articles', $data); 
		}
		return true;
	}
	function date_add_existing_record($count)
	{
				$prev_week = 604800;
				$updatetime = time();
				$loop=1;
				while($loop <= $count)
				{
					$updatetime = $updatetime-$prev_week;
					$data['created_on']=$updatetime;
					$this->db->where('id',$loop);
					$this->db->update('tbl_articles', $data);
					$loop++;
				}

	}
	
}
