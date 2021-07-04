<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url('auth'));
        }
        $this->id = $this->session->userdata('id');
    }

    public function index()
    {
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/dashboard');
        $this->load->view('back/template/footer');
    }
}
