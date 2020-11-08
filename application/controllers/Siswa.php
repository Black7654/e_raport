<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("SiswaModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->SiswaModel->getData('tb_siswa');
        $data['kelas'] = $this->kelasModel->getData('tb_kelas');
        $this->template->display_admin('admin/view_siswa.php', $data);
    }
    public function simpan()
    {
        $nis = 'NIS' . random_string('numeric', 12);
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $kota_kab = $this->input->post('kota_kab');
        $gender = $this->input->post('gender');
        $kelas = $this->input->post('kelas');

        $data = array(
            'nis' => $nis,
            'nama' => $nama,
            'password' => $password,
            'alamat' => $alamat,
            'kota_kab' => $kota_kab,
            'gender' => $gender,
            'kelas' => $kelas
        );

        $simpan = $this->SiswaModel->simpanData('tb_siswa', $data);
        redirect('siswa');
        return $simpan;
    }

    public function delete($nis)
    {
        $deleteSiswa = $this->SiswaModel->deleteData('tb_siswa', array('nis' => $nis));
        redirect('siswa');
        return $delete;
    }
}
