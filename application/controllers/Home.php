<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
                $this->load->helper('form');
        }

        public function index()
        {
                $data['halaman']='home';
                $this->load->view('templates/header',$data);
                $this->load->view('templates/navbar');
                $this->load->view('home');
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
        }
}