<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasModel extends CI_Model
{
    public function getData($tabel)
    {
        $data = $this->db->get($tabel);
        return $data->result();
    }

    public function getDataEdit($tabel, $col, $id)
    {
        $data = $this->db->get_where($tabel, array($col => $id));
        return $data->result();
    }

    public function getById($kode_kelas)
    {
        $data = $this->db->where('kode_kelas', $kode_kelas);
        $data = $this->db->get('tb_kelas');
        return $data;
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
