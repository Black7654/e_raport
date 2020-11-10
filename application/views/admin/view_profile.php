<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-fw fa-user-circle"></span>&nbspProfile</h1>
</div>

<!-- ini tabel -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">
            <span class="fa fa-user-circle"></span>&nbsp&nbspProfile
        </h3>
    </div>


    <form action="<?php echo base_url(); ?>profile/simpan" enctype="multipart/form-data" method="POST">
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <img src="assets/img/profile/profile.jpg" class="img-thumbnail rounded-circle">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <input type="hidden" class="form-control" placeholder="No">
                            </div>

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <input type="hidden" class="form-control" placeholder="ID Admin">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-primary"><span class="fa fa-save">&nbspSave</span></button>
                <button type="reset" class="btn btn-danger"><span class="fa fa-times">&nbspReset</button>
            </div>
        </div>
    </form>
</div>