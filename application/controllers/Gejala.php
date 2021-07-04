<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url());
        }
        $this->id = $this->session->userdata('id');
        $this->load->model('model_gejala');
    }

    public function listGejala()
    {
        $page['page'] = 'gejala';
        $data['listGejala'] = $this->model_gejala->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/gejala', $data);
        $this->load->view('back/template/footer');
    }


    public function getAllGejala()
    {
        $gejala = $this->model_gejala->getAll();
        echo json_encode($gejala);
    }

    public function gejalaById()
    {
        $id = $this->input->post('id');
        $gejala = $this->model_gejala->getById($id);
        $output = array(
            'kode_gejala' => $gejala->kode_gejala,
            'nama_gejala' => $gejala->nama_gejala
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

    public function getKodeGejala()
    {
        $kode = $this->model_gejala->getKode()->row();
        $kodeConv = (int)$kode->total_gejala;
        $jmlh = 0;
        $jmlh += $kodeConv + 1;
        if ($jmlh <= 9) {
            $output = array('kode' => 'G0' . $jmlh);
        } else {
            $output = array('kode' => 'G' . $jmlh);
        }
        echo json_encode($output);
    }

    public function deleteGejala()
    {
        $id = $this->input->post('id');
        $process = $this->model_gejala->deleteGejala($id);
        echo json_encode($process);
    }
}
