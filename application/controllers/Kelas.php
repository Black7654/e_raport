<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("KelasModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->KelasModel->getData('tb_kelas');
        $this->template->display_admin('admin/view_kelas.php', $data);
    }
    public function edit()
    {
        $kode_kelas = $this->input->post('kode_kelas', true);
        $data = $this->KelasModel->getById($kode_kelas);
        $result = $data->row();
        if (!(strcmp($result->aktif, "yes"))) {
            $aktif = "selected";
            $tidak = "";
        } else {
            $aktif = "";
            $tidak = "selected";
        }

        echo '
        <!-- content modal -->
                <form action="<?php echo base_url(); ?>kelas/simpan" enctype="multipart/form-data" method="POST">
                    <input type="hidden" class="form-control" id="kode_kelas" name="kode_kelas" value=' . $result->kode_kelas . '>

                    <div class="form-group">
                        <label for="exampleInputNamaKelas1">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value=' . $result->kode_kelas . '>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAktif1">Aktif</label>
                        <select class="form-control" name="aktif" id="aktif">
                            <option value="yes" ' . $aktif . '>Yes</option>
                            <option value="no" ' . $tidak . '>No</option>
                        </select>
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
        $kode_kelas = 'CLS' . random_string('numeric', 12);  //name=""
        $nama_kelas = $this->input->post('nama_kelas');
        $aktif = $this->input->post('aktif');

        $data = array(
            'kode_kelas' => $kode_kelas, //database
            'nama_kelas' => $nama_kelas,
            'aktif' => $aktif

        );

        $simpan = $this->KelasModel->simpanData('tb_kelas', $data);
        redirect('kelas');
        return $simpan;
    }

    public function delete($kode_kelas)
    {
        $deleteKelas = $this->KelasModel->deleteData('tb_kelas', array('kode_kelas' => $kode_kelas));
        redirect('kelas');
        return $delete;
    }
}
