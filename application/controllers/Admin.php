<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('isLogin');
        if ($this->isLogin == 0) {
            redirect(base_url());
        }
        $this->load->model('model_admin');
        $this->id = $this->session->userdata('id');
        $u = $this->model_admin->getById($this->id);
        $this->uname = $u->username;
    }

    public function listAdmin()
    {
        $page['page'] = 'Admin';
        $data['listAdmin'] = $this->model_admin->getAll();
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/admin', $data);
        $this->load->view('back/template/footer');
    }

    public function adminById()
    {
        $id = $this->input->post('id');
        $admin = $this->model_admin->getById($id);
        $output = array(
            'username' => $admin->username
        );
        echo json_encode($output);
    }

    public function doAdmin()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );
        $process = $this->model_admin->tambah($data);
        echo json_encode($process);
    }

    public function deleteAdmin()
    {
        $id = $this->input->post('id');
        $process = $this->model_admin->delete($id);
        echo json_encode($process);
    }

    public function pengaturan()
    {
        $data['user'] = $this->model_admin->getById($this->id);
        $data['page'] = 'Admin';
        $this->load->view('back/template/header');
        $this->load->view('back/template/sidebar');
        $this->load->view('back/pengaturan', $data);
        $this->load->view('back/template/footer');
    }

    public function editUsername()
    {
        $username = $this->input->post('username');
        $pesan = array();
        $data = array('username' => $username);
        $proses = $this->model_admin->edit($this->id, $data);
        if ($proses) {
            $pesan['cond'] = '1';
        } else {
            $pesan['cond'] = '0';
        }

        echo json_encode($pesan);
    }

    public function editPassword()
    {
        $cek = $this->model_admin->getByUname($this->uname);
        $pesan = array();
        if ($cek->num_rows() > 0) {
            $user = $cek->row();
            $pass_lama = $this->input->post('pass_lama');
            if (password_verify($pass_lama, $user->password)) {
                $pass_baru = $this->input->post('pass_baru');
                $data = array('password' => password_hash($pass_baru, PASSWORD_DEFAULT));
                $this->model_admin->edit($this->id, $data);
                $pesan['cond'] = 1;
            } else {
                $pesan['cond'] = 0;
            }
        }
        echo json_encode($pesan);
    }
}
