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
        $this->load->model('model_konsul');
        $this->load->model('model_detail_konsul');
        $this->load->model('model_diagnosa');
        $data['page'] = 'Dashboard';
        $data['listKonsultasi'] = $this->model_konsul->getAll();
        $data['listDiagnosa'] = $this->model_diagnosa->getAll();
        $data['listDetail'] = $this->model_detail_konsul->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/dashboard', $data);
        $this->load->view('back/template/footer');
    }
}
