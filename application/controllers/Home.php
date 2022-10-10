<?php
class Home extends CI_Controller {

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

                $data['category_in'] = $this->category->getCategoryIn();
                $data['category_out'] = $this->category->getCategoryOut();
                $data['halaman']='home';
                $this->load->view('templates/header',$data);
                $this->load->view('templates/navbar');
                $this->load->view('pages/home/home');
                $this->load->view('templates/sidebar');
                $this->load->view('pages/home/footer');
        }
}