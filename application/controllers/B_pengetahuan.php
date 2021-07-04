<?php
defined('BASEPATH') or exit('No direct script access allowed');

class B_pengetahuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url());
        }
        $this->id = $this->session->userdata('id');
        $this->load->model('model_b_pengetahuan');
    }

    public function listPengetahuan()
    {
        $this->load->model('model_gejala');
        $this->load->model('model_diagnosa');
        $data['page'] = 'Basis Pengetahuan';
        $data['listPengetahuan'] = $this->model_b_pengetahuan->getAll();
        $data['gejala'] = $this->model_gejala->getAll();
        $data['diagnosa'] = $this->model_diagnosa->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/pengetahuan', $data);
        $this->load->view('back/template/footer');
    }

    public function getAllGejala()
    {
        $gejala = $this->model_b_pengetahuan->getAll();
        echo json_encode($gejala);
    }

    public function pengetahuanById()
    {
        $id = $this->input->post('id');
        $pengetahuan = $this->model_b_pengetahuan->getById($id);
        $output = array(
            'id_diagnosa' => $pengetahuan->id_diagnosa,
            'id_gejala' => $pengetahuan->id_gejala,
            'mb' => $pengetahuan->mb,
            'md' => $pengetahuan->md
        );
        echo json_encode($output);
    }

    public function doPengetahuan()
    {
        $operation = $this->input->post('operation');
        if ($operation == "Tambah") {
            $data = array(
                'id_diagnosa' => $this->input->post('id_diagnosa'),
                'id_gejala' => $this->input->post('id_gejala'),
                'mb' => $this->input->post('mb'),
                'md' => $this->input->post('md')
            );
            $process = $this->model_b_pengetahuan->tambah($data);
        } else if ($operation == "Edit") {
            $id = $this->input->post('id_pengetahuan');
            $data = array(
                'id_diagnosa' => $this->input->post('id_diagnosa'),
                'id_gejala' => $this->input->post('id_gejala'),
                'mb' => $this->input->post('mb'),
                'md' => $this->input->post('md')
            );
            $process = $this->model_b_pengetahuan->edit($id, $data);
        }
        echo json_encode($process);
    }

    public function deletePengetahuan()
    {
        $id = $this->input->post('id');
        $process = $this->model_b_pengetahuan->delete($id);
        echo json_encode($process);
    }
}
