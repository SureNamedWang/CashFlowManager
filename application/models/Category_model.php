<?php
class Category_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    function checkNama($nama,$tipe){
        $this->db->where('nama',$nama);
        $this->db->where('tipe',$tipe);
        $this->db->where('is_deleted',0);

        $query = $this->db->get('category');

        if($query->num_rows()>0){
            return 1;
        }
        
        return 0;
    }

    //insert new category
    //Category add()
    function insert($data){
        $this->db->insert('category',$data);
    }
}