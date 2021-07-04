<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();

    // }

    public function index()
    {
        // $this->tamu = $this->session->userdata('id_tamu');
        // if ($this->tamu) {
        //     redirect('konsultasi');
        // }
        $this->load->model('model_gejala');
        $data['gejala'] = $this->model_gejala->getAll();
        $this->load->view('front/index', $data);
    }

    public function konsul()
    {
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $telepon = $this->input->post('telepon');
        $postGejala = $this->input->post('form_gejala');

        $this->load->model('model_diagnosa');
        $this->load->model('model_gejala');
        $this->load->model('model_b_pengetahuan');
        $this->load->model('model_konsul');
        $this->load->model('model_detail_konsul');
        $this->load->model('model_temp_gejala');

        $hasil = array();
        $x = 0;
        $diagnosa = $this->model_diagnosa->getAll();
        foreach ($diagnosa as $diag) {
            $id_diagnosa = $diag->id_diagnosa;
            $penyakit_dipilih = 0;
            $cf_gabungan = 0;
            $cf = 0;
            $b_pengetahuan = $this->model_b_pengetahuan->getAllWhere($id_diagnosa);
            foreach ($b_pengetahuan as $bp) {
                for ($i = 0; $i < count($postGejala); $i++) {
                    $id_gejala = $postGejala[$i];
                    if ($bp->id_gejala == $id_gejala) {
                        $penyakit_dipilih = 1;
                        $cf = $bp->mb - $bp->md;
                        if ($i > 0) {
                            if ($cf >= 0 && $cf_gabungan >= 0) {         // jika CF positif dengan positif
                                $cf_gabungan = $cf_gabungan + $cf * (1 - $cf_gabungan); // rumus CF + +
                            } elseif ($cf < 0 && $cf_gabungan < 0) {     // jika CF negatif dengan negatif
                                $cf_gabungan = $cf_gabungan + $cf * (1 + $cf_gabungan); // rumus CF - -
                            } else {                                 // jika CF salah satunya positif/negatif
                                $min = 0;
                                // abs ini fungsi untuk mengambil nilai absolut, jadi jika nilainya minus misal -5 maka akan di absolutkan dan diambil nilai 5 nya saja tanpa minus
                                if (abs($cf_gabungan) < abs($cf)) {
                                    $min = abs($cf_gabungan);
                                } else if (abs($cf_gabungan) > abs($cf)) {
                                    $min = abs($cf);
                                } else {
                                    $min = abs($cf_gabungan);
                                }
                                $cf_gabungan = ($cf_gabungan + $cf) / (1 - $min); // rumus CF jika salah satunya postifi/negatif
                            }
                        } else {
                            $cf_gabungan = $cf;
                        }
                    }
                }
            }
            if ($penyakit_dipilih != 0) {
                $store = array(
                    'id_diagnosa' => $id_diagnosa,
                    'nilai' => $cf_gabungan
                );
                array_push($hasil, $store);
            }
        }
        $this->array_sort_by_column($hasil, 'nilai');
        $pasien = array(
            'nama' => $nama,
            'jk' => $jk,
            'tgl_lahir' => $tgl_lahir,
            'telepon' => $telepon
        );
        $insert = $this->model_konsul->tambah($pasien);
        for ($k = 0; $k < count($hasil); $k++) {
            $detail_konsul = array(
                'id_konsul' => $insert,
                'id_diagnosa' => $hasil[$k]['id_diagnosa'],
                'nilai' => $hasil[$k]['nilai']
            );
            $this->model_detail_konsul->tambah($detail_konsul);
        }
        for ($l = 0; $l < count($postGejala); $l++) {
            $d = array(
                'id_konsul' => $insert,
                'id_gejala' => $postGejala[$l]
            );
            $this->model_temp_gejala->tambah($d);
        }
        $konsul['gejala_dipilih'] = $postGejala;
        $konsul['gejala'] = $this->model_gejala->getAll();
        $konsul['nama'] = $nama;
        $konsul['jk'] = $jk;
        $konsul['tgl_lahir'] = date('d F Y', strtotime($tgl_lahir));
        $konsul['telepon'] = $telepon;
        $konsul['id_konsul'] = $insert;
        $konsul['konsul'] = $this->model_detail_konsul->getByIdKonsul($insert);

        $this->load->view('front/konsul.php', $konsul);
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    public function cetak($id)
    {
        $this->load->model('model_diagnosa');
        $this->load->model('model_gejala');
        $this->load->model('model_konsul');
        $this->load->model('model_detail_konsul');
        $this->load->model('model_temp_gejala');

        $data['konsul'] = $this->model_konsul->getById($id);
        $data['detail'] = $this->model_detail_konsul->getByIdKonsul($id);
        $data['temp'] = $this->model_temp_gejala->getByIdKonsul($id);
        $filename = "hasil.pdf";
        ob_start();
        $this->load->view('front/cetak', $data);
        $html = ob_get_contents();
        ob_end_clean();
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
}
