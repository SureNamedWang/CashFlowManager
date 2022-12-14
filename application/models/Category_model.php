<?php
class Category_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    //check existing category
    //Category add()
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

    //get all categories
    //Category index()
    function getAll(){
        $this->db->where('is_deleted',0);
        $query = $this->db->get('category');

        return $query->result();
    }

    //delete category
    //Category delete()
    function delete($id,$data){
        $this->db->where('category_id',$id);
        $this->db->update('category',$data);
    }

    //get Category In
    //Home index()
    function getCategoryIn(){
        $this->db->where('is_deleted',0);
        $this->db->where('tipe','in');
        $query = $this->db->get('category');

        return $query->result();
    }

    //get Category Out
    //Home index()
    function getCategoryOut(){
        $this->db->where('is_deleted',0);
        $this->db->where('tipe','out');
        $query = $this->db->get('category');

        return $query->result();
    }

    //get one category data
    //Cashflow add()
    function getCategoryData($id){
        $this->db->where('category_id',$id);
        $query = $this->db->get('category');

        return $query->row();
    }
}