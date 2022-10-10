<?php
class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Category_model','category');
    }

    public function index()
    {
        if(isset($_SESSION['error'])){
            $data['error'] = $_SESSION['error'];
        }
        if(isset($_SESSION['message'])){
            $data['message'] = $_SESSION['message'];
        }
        session_destroy();
        $data['halaman']='category';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('pages/category/all');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    // insert new category
    // Form Add Category
    public function add(){
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');

        //Check apakah ada kategori dengan nama yang sama
        $checkNama = $this->category->checkNama($nama,$tipe);

        if($checkNama == 1){
            $_SESSION['error'] = "Telah ada Category dengan nama yang sama";
            redirect(base_url()."Category/");
        }

        //Insert data
        $created = new DateTime("now",new DateTimeZone("Asia/Jakarta"));
        $created = $created->format('Y-m-d H:i:s');

        $data_insert = array(
            'nama' => $nama,
            'tipe' => $tipe,
            'created_date' => $created,
        );

        $this->category->insert($data_insert);
        $_SESSION['message'] = "Category baru telah berhasil tersimpan";
        redirect(base_url()."Category/");
    }
}