<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url());
        }
        $this->id = $this->session->userdata('id');
        $this->load->model('model_diagnosa');
    }

    public function listDiagnosa()
    {
        $page['page'] = 'diagnosa';
        $data['listDiagnosa'] = $this->model_diagnosa->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/diagnosa', $data);
        $this->load->view('back/template/footer');
    }

    public function getAlldiagnosa()
    {
        $diagnosa = $this->model_diagnosa->getAll();
        echo json_encode($diagnosa);
    }

    public function diagnosaById()
    {
        $id = $this->input->post('id');
        $diagnosa = $this->model_diagnosa->getById($id);
        $output = array(
            'kode_diagnosa' => $diagnosa->kode_diagnosa,
            'nama_diagnosa' => $diagnosa->nama_diagnosa,
            'keterangan' => $diagnosa->keterangan
        );
        echo json_encode($output);
    }

    public function doDiagnosa()
    {
        $operation = $this->input->post('operation');
        if ($operation == "Tambah") {
            $data = array(
                'kode_diagnosa' => $this->input->post('kode_diagnosa'),
                'nama_diagnosa' => $this->input->post('nama_diagnosa'),
                'keterangan' => $this->input->post('keterangan')
            );
            $process = $this->model_diagnosa->tambah($data);
        } else if ($operation == "Edit") {
            $id = $this->input->post('id_diagnosa');
            $data = array(
                'kode_diagnosa' => $this->input->post('kode_diagnosa'),
                'nama_diagnosa' => $this->input->post('nama_diagnosa'),
                'keterangan' => $this->input->post('keterangan')
            );
            $process = $this->model_diagnosa->edit($id, $data);
        }
        echo json_encode($process);
    }

    public function deleteDiagnosa()
    {
        $id = $this->input->post('id');
        $process = $this->model_diagnosa->delete($id);
        echo json_encode($process);
    }
}
