<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("ProfileModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->ProfileModel->getData('tb_admin');
        $this->template->display_admin('admin/view_profile.php');
    }

    public function simpan()
    {
        $id_admin = $this->input->post('id_admin'); //name=""
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'id_admin' => $id_admin, //database
            'username' => $username,
            'password' => $password

        );

        $simpan = $this->ProfileModel->simpanData('tb_admin', $data);
        redirect('admin');
        return $simpan;
    }
}
