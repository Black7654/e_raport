 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-fw fa-list-ol"></span>&nbspNilai Siswa</h1>
 </div>

 <!-- ini tabel -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h3 class="m-0 font-weight-bold text-primary">
             <span class="fas fa-fw fa-list-ol"></span>&nbsp&nbspData Nilai
             <a href="#" type="button" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#exampleModal1">
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
                         <th class="text-center">ID Nilai</th>
                         <th class="text-center">NIS</th>
                         <th class="text-center">Mata Pelajaran</th>
                         <th class="text-center">Nilai</th>
                         <th class="text-center">Tanggal Pelajaran</th>
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
                                 <td class="text-center"><?php echo $row->id_nilai; ?></td>
                                 <td class="text-center"><?php echo $row->nis; ?></td>
                                 <td class="text-center"><?php echo $row->mapel; ?></td>
                                 <td class="text-center"><?php echo $row->nilai; ?></td>
                                 <td class="text-center"><?php echo $row->tanggal; ?></td>
                                 <td class="text-center">
                                     <a class="fa fa-edit" data-toggle="modal" data-target="#exampleModal2"></a>&nbsp||&nbsp<a class="fa fa-trash" href="<?php echo base_url(); ?>nilai/delete/<?php echo $row->id_nilai; ?>"></a>
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
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="exampleModalLabel"><span class="fa fa-book"></span>&nbsp&nbspForm Data Nilai</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <!-- content modal -->
                 <form action="<?php echo base_url(); ?>nilai/simpan" enctype="multipart/form-data" method="POST">

                     <div class="row">
                         <div class="form-group col-md-6">

                             <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" placeholder="ID Nilai">
                         </div>

                         <div class="form-group col-md-6">

                             <input type="hidden" class="form-control" id="nis" name="nis" placeholder="NIS">
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-6">
                             <label for="exampleInputMapel1">Mata Pelajaran</label>
                             <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mata Pelajaran">
                         </div>

                         <div class="form-group col-md-6">
                             <label for="exampleInputGuru1">Nilai</label>
                             <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai">
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputMapel1">Tanggal</label>
                         <input type="date" class="form-control" id="tanggal" name="tanggal">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputAktif1">Aktif</label>
                         <select class="form-control" name="aktif" id="aktif">
                             <option value="">-- Pilih--</option>
                             <option value="yes">Yes</option>
                             <option value="no">No</option>
                         </select>
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

 <!-- Modal2 -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="exampleModalLabel"><span class="fa fa-edit"></span>&nbsp&nbspForm Edit Data Nilai</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <!-- content modal -->
                 <form action="<?php echo base_url(); ?>nilai/simpan" enctype="multipart/form-data" method="POST">

                     <div class="row">
                         <div class="form-group col-md-6">

                             <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" placeholder="ID Nilai">
                         </div>

                         <div class="form-group col-md-6">

                             <input type="hidden" class="form-control" id="nis" name="nis" placeholder="NIS">
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-6">
                             <label for="exampleInputMapel1">Mata Pelajaran</label>
                             <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mata Pelajaran">
                         </div>

                         <div class="form-group col-md-6">
                             <label for="exampleInputGuru1">Nilai</label>
                             <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai">
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputMapel1">Tanggal</label>
                         <input type="date" class="form-control" id="tanggal" name="tanggal">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputAktif1">Aktif</label>
                         <select class="form-control" name="aktif" id="aktif">
                             <option value="">-- Pilih--</option>
                             <option value="yes">Yes</option>
                             <option value="no">No</option>
                         </select>
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