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

    public function index(){
        if(isset($_SESSION['error'])){
            $data['error'] = $_SESSION['error'];
        }
        if(isset($_SESSION['message'])){
            $data['message'] = $_SESSION['message'];
        }
        session_destroy();

        $now = date('Y-m-d');
        $firstdate = date('Y-01-01');

        $from = $this->input->get('from');
        $to = $this->input->get('to');
        if($from==null){
            $from=$firstdate;
        }
        if($to==null){
            $to = $now;
        }

        $data['start_date'] = $from;
        $data['end_date'] = $to;

        $data['cashflows'] = $this->cashflow->getCashFlow($from,$to);
        $data['halaman'] = 'cashflow';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('pages/cashflow/cashflow');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/cashflow/footer');
    }

    public function approve(){
        $id = $this->input->post('id');

        $created = new DateTime("now",new DateTimeZone("Asia/Jakarta"));
        $created = $created->format('Y-m-d H:i:s');
        $data = array(
            "is_approved" => 1,
            "approved_date" => $created,
            "last_updated_date" => $created,
        );
        $this->cashflow->ApproveCashFlow($id,$data);
        redirect(base_url()."Cashflow/");
    }

    public function delete(){
        $id = $this->input->post('id');

        $created = new DateTime("now",new DateTimeZone("Asia/Jakarta"));
        $created = $created->format('Y-m-d H:i:s');
        $data = array(
            "is_deleted" => 1,
            "deleted_date" => $created,
            "last_updated_date" => $created,
        );
        $this->cashflow->DeleteCashFlow($id,$data);
        redirect(base_url()."Cashflow/");
    }
}