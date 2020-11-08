<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model("Model_admin");
    }
    public function index()
    {
        $this->template->display_admin('admin/view_dashboard.php');
    }
}
