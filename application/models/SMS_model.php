<?php
class SMS_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    function getAPI(){
        $query = $this->db->get('sms_api');

        return $query->row();
    }

    function logSMS($data){
        $this->db->insert('sms',$data);
    }
}