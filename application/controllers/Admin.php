<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("AdminModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->AdminModel->getData('tb_admin');
        $this->template->display_admin('admin/view_admin.php', $data);
    }
    public function edit()
    {

        // $this->template->display_admin('admin/view_edit_admin.php', $data);
        $id_admin = $this->input->post('id_admin', true);
        $data = $this->AdminModel->getById($id_admin);
        $result = $data->row();
        echo '
        <form action="<?php echo base_url(); ?>admin/simpan" enctype="multipart/form-data" method="POST">
        <input type="hidden" class="form-control" id="id_admin" name="id_admin" value=' . $result->id_admin . '>

        <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value=' . $result->username . ' required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value=' . $result->password . ' required>
        </div>

        <!-- end content modal -->

<div class="modal-footer">
<button type="submit" class="btn btn-primary"><span class="fa fa-save"></span>&nbspSimpan</button>
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspClose</button>
</div>
</form>
        ';
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

        $simpan = $this->AdminModel->simpanData('tb_admin', $data);
        redirect('admin');
        return $simpan;
    }

    // Edit Data
    public function update()
    {
        $id_admin = $this->input->post('id_admin'); //name=""
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'id_admin' => $id_admin, //database
            'username' => $username,
            'password' => $password

        );

        $update = $this->AdminModel->updateData('tb_admin', $data, array('id_admin' => $id_admin));
        redirect('admin');
        return $update;
    }
    // End Edit Data

    public function delete($id_admin)
    {
        $deleteAdmin = $this->AdminModel->deleteData('tb_admin', array('id_admin' => $id_admin));
        redirect('admin');
        return $delete;
    }
}
