<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiModel extends CI_Model
{
    public function getData($tabel)
    {
        $data = $this->db->get($tabel);
        return $data->result();
    }
    public function getSiswa()
    {
        $data = $this->db->query(' 
        SELECT tb_nilai.id_nilai, 
        tb_nilai.nis AS nis_nilai, 
        tb_nilai.mapel, 
        tb_nilai.nilai ,
        tb_nilai.tanggal,
        tb_mapel.id_mapel, 
        tb_mapel.nama_mapel, 
        tb_mapel.guru, 
        tb_mapel.aktif,
        tb_siswa.* FROM tb_nilai
        LEFT JOIN tb_mapel ON tb_mapel.id_mapel = tb_nilai.mapel  
        LEFT JOIN tb_siswa ON tb_siswa.nis = tb_nilai.nis WHERE tb_nilai.mapel = tb_mapel.id_mapel AND tb_siswa.nis = tb_nilai.nis 
        ORDER BY tb_nilai.nis DESC 
        ');
        return $data->result();
    }

    public function getDataEdit($tabel, $col, $id)
    {
        $data = $this->db->get_where($tabel, array($col => $id));
        return $data->result();
    }

    public function getDataTerakhir($tabel, $id)
    {
        $data = $this->db->query("SELECT * FROM " . $tabel . " ORDER BY " . $id . " DESC limit 1");
        return $data->result_array();
    }

    public function simpanData($tabel, $data)
    {
        $data = $this->db->insert($tabel, $data);
        return $data;
    }

    public function updateData($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $data;
    }

    public function deleteData($tabel, $where)
    {
        $data = $this->db->delete($tabel, $where);
        return $data;
    }

    public function truncate($tabel)
    {
        $data = $this->db->query('TRUNCATE TABLE ' . $tabel);
        return $data;
    }
}
