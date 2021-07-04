<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url());
        }
        $this->id = $this->session->userdata('id');
        $this->load->model('model_konsul');
        $this->load->model('model_detail_konsul');
        $this->load->model('model_temp_gejala');
    }

    public function listKonsultasi()
    {
        $data['page'] = 'Record Konsultasi';
        $data['listKonsultasi'] = $this->model_konsul->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/konsultasi', $data);
        $this->load->view('back/template/footer');
    }

    public function konsulById()
    {
        $id = $this->input->post('id');
        $konsul = $this->model_konsul->getById($id);
        $temp = $this->model_temp_gejala->getByIdKonsul($id);
        $detail = $this->model_detail_konsul->getByIdKonsul($id);
        $output = array(
            'konsul' => $konsul,
            'detail' => $detail,
            'temp' => $temp
        );
        echo json_encode($output);
    }

    public function doGejala()
    {
        $operation = $this->input->post('operation');
        if ($operation == "Tambah") {
            $data = array(
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala')
            );
            $process = $this->model_gejala->tambahGejala($data);
        } else if ($operation == "Edit") {
            $id = $this->input->post('id_gejala');
            $data = array(
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala')
            );
            $process = $this->model_gejala->editGejala($id, $data);
        }
        echo json_encode($process);
    }

    public function deleteKonsul()
    {
        $id = $this->input->post('id');
        $process = $this->model_konsul->delete($id);
        $process = $this->model_detail_konsul->delete($id);
        $process = $this->model_temp_gejala->delete($id);
        echo json_encode($process);
    }
}
