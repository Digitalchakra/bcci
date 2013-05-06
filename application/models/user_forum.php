
<?php
Class User_forum extends CI_Model
{
 function update_user($where,$data)
 {
	
	$this->db->where($where);
  if($newuser = $this->db->update('phpbb_users',$data))
  {
		return true;
  }
  else
  {
	  return false;
  }
 }
 function check_user($data)
 {
    //$email=$this->input->post('email_address');
	$this -> db -> select('user_id,username,user_email');
	$this -> db -> from('phpbb_users');
	$this -> db -> where($data);
	$query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
	  return $query->result_array();
   }
   else
   {
	   return false;
   }
 }
 function activate_user($id,$code)
 {
	$this -> db -> select('user_id,username');
	$this -> db -> from('phpbb_users');
	$this -> db -> where('user_actkey', $code);
	$this -> db -> where('user_id', $id);
	$query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
    $usr_result=$query->result();
    $data = array('user_actkey' => "",'user_type' => 0);
    $this ->db ->update('phpbb_users',$data);
    
     $this->db->flush_cache();
     $data = array('config_value' => $usr_result[0]->user_id);
     $this -> db -> where('config_name', 'newest_user_id');
     $this ->db ->update('phpbb_config',$data);

     $this->db->flush_cache();
     $data = array('config_value' => $usr_result[0]->username);
     $this -> db -> where('config_name', 'newest_username');
     $this ->db ->update('phpbb_config',$data);
     return true;
   }
   else
   {
	   return false;
   }
 }
}
?>

