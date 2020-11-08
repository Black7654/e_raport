<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("NilaiModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->NilaiModel->getSiswa();
        $this->template->display_admin('admin/view_nilai.php', $data);
    }
    public function simpan()
    {
        $id_nilai = 'VAL' . random_string('numeric', 12);  //name=""
        $nis = $this->input->post('nis');
        $mapel = $this->input->post('mapel');
        $nilai = $this->input->post('nilai');
        $tanggal = $this->input->post('tanggal');

        $data = array(
            'id_nilai' => $id_nilai, //database
            'nis' => $nis,
            'mapel' => $mapel,
            'nilai' => $nilai,
            'tanggal' => $tanggal
        );

        $simpan = $this->NilaiModel->simpanData('tb_nilai', $data);
        redirect('nilai');
        return $simpan;
    }

    public function delete($id_nilai)
    {
        $deleteNilai = $this->NilaiModel->deleteData('tb_nilai', array('id_nilai' => $id_nilai));
        redirect('nilai');
        return $delete;
    }
}
