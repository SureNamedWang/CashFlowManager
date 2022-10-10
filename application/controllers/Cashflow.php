<?php
class Cashflow extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Category_model','category');
        $this->load->model('Cashflow_model','cashflow');
    }

    public function add(){
        $tipe = $this->input->post('tipe');
        if($tipe=='in'){
            $category_id = $this->input->post('category_in');
        }
        if($tipe=='out'){
            $category_id = $this->input->post('category_out');
        }
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');

        $category = $this->category->getCategoryData($category_id);

        //Insert data
        $created = new DateTime("now",new DateTimeZone("Asia/Jakarta"));
        $created = $created->format('Y-m-d H:i:s');

        $data_input = array(
            "category_id" => $category_id,
            "tipe" => $tipe,
            "category_name" => $category->nama,
            "nominal" => $nominal,
            "keterangan" => $keterangan,
            "created_date" => $created,
            "last_updated_date" => $created, 
        );

        $this->cashflow->add($data_input);

        $_SESSION['message'] = "Pencatatan baru telah berhasil tersimpan";
        redirect(base_url()."Home/");
    }
}