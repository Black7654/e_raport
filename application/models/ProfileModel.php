<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ProfileModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($tabel)
    {
        $data = $this->db->get($tabel);
        return $data->result();
    }

    public function getById($id_admin)
    {
        $data = $this->db->where('id_admin', $id_admin);
        $data = $this->db->get('tb_admin');
        return $data;
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
