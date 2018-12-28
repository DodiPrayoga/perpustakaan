<?php
 
class User_model extends CI_Model {
 
  function __construct()
  {
    parent::__construct();
  }
  function SaveForm($form_data)
  {
    $this->db->insert('member', $form_data);
 
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
 
    return FALSE;
  }
  
     public function cek_login($user_name, $password){
           $this->db->select('*');
           $this->db->from('admin');
           $this->db->where('user_name', $user_name);
           $this->db->where('password',$password);

           return $this->db->get()->num_rows(); 
      }
  function list_table()
  {
    return $this->db->get('v_userpinjam');
  }
  function book()
  {
    return $this->db->get('buku');
  }
  function list_anggota()
  {
    return $this->db->get('anggota');
  }
   function list_member()
  {
    return $this->db->get('member');
  }
}
?>