<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
                $this->load->helper('form');
                $this->load->model('Category_model','category');
                $this->load->model('Cashflow_model','cashflow');
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

                $data['category_in'] = $this->category->getCategoryIn();
                $data['category_out'] = $this->category->getCategoryOut();
                $data['halaman']='home';

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

                $data['saldo'] = "Rp " . number_format($this->cashflow->getSaldo($from,$to),0,',','.');
                $data['pengeluaran'] = "Rp " . number_format($this->cashflow->getPengeluaran($from,$to),0,',','.');
                $data['pemasukan'] = "Rp " . number_format($this->cashflow->getPemasukan($from,$to),0,',','.');
                $data['pengeluaran_pending'] = "Rp " . number_format($this->cashflow->getPengeluaranPending($from,$to),0,',','.');
                $data['pemasukan_pending'] = "Rp " . number_format($this->cashflow->getPemasukanPending($from,$to),0,',','.');
                $this->load->view('templates/header',$data);
                $this->load->view('templates/navbar');
                $this->load->view('pages/home/home');
                $this->load->view('templates/sidebar');
                $this->load->view('pages/home/footer');
        }
}