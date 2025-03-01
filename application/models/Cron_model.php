<?php
class Cron_model extends CI_Model {

    function users(){
        $id=$this->session->userdata('uid');;
        $this->db->select("*");
        $this->db->where('phone_number !=', "");
        $this->db->where('google_calendar_token !=', "");
        $this->db->where('google_refresh_token !=', "");
            $qry = $this->db->get('user');
            $result = $qry->result_array();
            return $result;
    }

}
?>