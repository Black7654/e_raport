<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("MapelModel");
        $this->load->library('template');
    }
    public function index()
    {
        $data['data'] = $this->MapelModel->getData('tb_mapel');
        $this->template->display_admin('admin/view_mapel.php', $data);
    }

    public function edit()
    {
        $id_mapel = $this->input->post('id_mapel', true);
        $data = $this->MapelModel->getById($id_mapel);
        $result = $data->row();
        echo '
        <!-- content modal -->
        <form action="<?php echo base_url(); ?>mapel/simpan" enctype="multipart/form-data" method="POST">
            <input type="hidden" class="form-control" id="id_mapel" name="id_mapel" value=' . $result->id_mapel . '>

            <div class="form-group">
                <label for="exampleInputMapel1">Nama Mata Pelajaran</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value=' . $result->id_mapel . '>
            </div>

            <div class="form-group">
                <label for="exampleInputGuru1">Guru</label>
                <input type="text" class="form-control" id="guru" name="guru" value=' . $result->id_mapel . '>
            </div>

            <div class="form-group">
                <label for="exampleInputAktif1">Aktif</label>
                <select class="form-control" name="aktif" id="aktif">
                    <option value=""><?php echo $row->aktif; ?></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
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
        $id_mapel = 'MAP' . random_string('numeric', 12);  //name=""
        $nama_mapel = $this->input->post('nama_mapel');
        $guru = $this->input->post('guru');
        $aktif = $this->input->post('aktif');

        $data = array(
            'id_mapel' => $id_mapel, //database
            'nama_mapel' => $nama_mapel,
            'guru' => $guru,
            'aktif' => $aktif

        );

        $simpan = $this->MapelModel->simpanData('tb_mapel', $data);
        redirect('mapel');
        return $simpan;
    }

    public function delete($id_mapel)
    {
        $deleteMapel = $this->MapelModel->deleteData('tb_mapel', array('id_mapel' => $id_mapel));
        redirect('mapel');
        return $delete;
    }
}
