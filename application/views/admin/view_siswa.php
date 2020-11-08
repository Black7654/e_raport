 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-fw fa-list-ol"></span>&nbspData Siswa</h1>
 </div>

 <!-- ini tabel -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h3 class="m-0 font-weight-bold text-primary">
             <span class="fas fa-fw fa-list-ol"></span>&nbsp&nbspData Siswa
             <a href="#" type="button" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#exampleModal">
                 <span class=" icon text-white-50">
                     <i class="fas fa-plus"></i>
                 </span>
                 <span class="text">Add</span>
             </a>
         </h3>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th class="text-center">NO</th>
                         <th class="text-center">NIS</th>
                         <th class="text-center">Nama</th>
                         <th class="text-center">Password</th>
                         <th class="text-center">Alamat</th>
                         <th class="text-center">Kota/Kabupaten</th>
                         <th class="text-center">Gender</th>
                         <th class="text-center">Kelas</th>
                         <th class="text-center">Action</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        if (is_array($data)) {
                            $no = 0;
                            foreach ($data as $row) {
                                $no++; ?>
                             <tr>
                                 <td class="text-center"><?php echo $no; ?></td>
                                 <td class="text-center"><?php echo $row->nis; ?></td>
                                 <td class="text-center"><?php echo $row->nama; ?></td>
                                 <td class="text-center"><?php echo $row->password; ?></td>
                                 <td class="text-center"><?php echo $row->alamat; ?></td>
                                 <td class="text-center"><?php echo $row->kota_kab; ?></td>
                                 <td class="text-center"><?php echo $row->gender; ?></td>
                                 <td class="text-center"><?php echo $row->kelas; ?></td>
                                 <td class="text-center">
                                     <a class="fa fa-edit" data-toggle="modal" data-target="#exampleModal2"></a>&nbsp||&nbsp<a class="fa fa-trash" href="<?php echo base_url(); ?>siswa/delete<?php echo $row->nis; ?>"></a>
                                 </td>

                             </tr>
                     <?php }
                        }
                        ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <!-- end tabel -->

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="exampleModalLabel"><span class="fas fa-fw fa-users"></span>&nbsp&nbspForm Data Siswa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container text-left">
                     <!-- content modal -->
                     <form action="<?php echo base_url(); ?>siswa/simpan" enctype="multipart/form-data" method="POST">
                         <!-- <input type="hidden" class="form-control" id="id_mapel" name="id_mapel"> -->
                         <div class="row">
                             <div class="form-group col-md-6">


                                 <input type="hidden" class="form-control" id="nis" name="nis" placeholder="NIS" required />
                             </div>

                             <div class="form-group col-md-6 ">
                                 <label for="exampleInputNama1">Nama</label>
                                 <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="form-group col-md-6">
                                 <label for="exampleInputPass1">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="exampleInputAlamat1">Alamat</label>
                                 <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="exampleInputKota1">Kota / Kabupaten</label>
                             <input type="textarea" class="form-control" id="kota_kab" name="kota_kab" placeholder="Kota/Kabupaten" required>
                         </div>

                         <div class="form-group">
                             <label for="exampleInputAktif1">Jenis Kelamin</label>
                             <select class="form-control" name="gender" id="aktif">
                                 <option>-- Pilih--</option>
                                 <option value="L">Laki - Laki</option>
                                 <option value="P">Perempuan</option>
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="exampleInputKelas1">Kelas</label>
                             <?php foreach ($kelas->result_array() as $row){?>
                                <option value="<?php echo $row['kode_kelas']?><?php echo $row['nama_kelas']?>"></option>
                         </div>


                         <!-- end content modal -->
                 </div>
             </div>

             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span>&nbspSimpan</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspClose</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal2 -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="exampleModalLabel"><span class="fas fa-fw fa-edit"></span>&nbspForm Edit Nilai</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <!-- content modal -->
                 <form action="<?php echo base_url(); ?>mapel/simpan" enctype="multipart/form-data" method="POST">
                     <!-- <input type="hidden" class="form-control" id="id_mapel" name="id_mapel"> -->

                     <div class="form-group">
                         <label for="exampleInputMapel1">NIS</label>
                         <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $row->nis; ?>">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputGuru1">Mata Pelajaran</label>
                         <input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $row->mapel; ?>">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputGuru1">Nilai</label>
                         <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $row->nilai; ?>">
                     </div>

                     <!-- end content modal -->
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span>&nbspSimpan</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspClose</button>
             </div>
             </form>
         </div>
     </div>
 </div>