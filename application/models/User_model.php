<?php
class User_model extends CI_Model
{
 function index()
 {
    $id=$this->session->userdata('uid');;
    $this->db->select("*");
    $this->db->where('login_oauth_uid', $id);
		$qry = $this->db->get('user');
		$result = $qry->result_array();
		return $result;
 }

 function update_user($data,$id)
    {
        $this->db->where('login_oauth_uid', $id);
        $this->db->update('user',$data);
        $this->db->affected_rows();
    }

}