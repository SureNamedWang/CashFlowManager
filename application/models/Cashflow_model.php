<?php
class Cashflow_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    //insert new cashflow
    //Cashflow add()
    public function add($data){
        $this->db->insert('cashflow',$data);
    }
}