
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
	$this -> db -> select('user_id');
	$this -> db -> from('phpbb_users');
	$this -> db -> where('user_actkey', $code);
	$this -> db -> where('user_id', $id);
	$query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
	   $data = array('user_actkey' => "",'user_type' => 0);
	   $this ->db ->update('phpbb_users',$data);
     return true;
   }
   else
   {
	   return false;
   }
 }
}
?>

