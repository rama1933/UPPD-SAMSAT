<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="username">Username <small class="text-danger">*</small></label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password">Password <small class="text-danger">*</small></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-10">
                            <label for="nik">NIK <small class="text-danger">*</small></label>
                            <input type="text" id="nik" name="nik" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-2 mt-3">
                                <button id="periksa" class="btn btn-md btn-primary "><i class="nc-icon nc-zoom-split"></i></button>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" id="nama" name="nama" class="form-control" required readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" id="no_hp" name="no_hp" class="form-control" onkeypress="return hanyaAngka(event)" required readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="5" data-rule="required" required readonly></textarea>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
                            <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" required readonly/>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                                <input id="tanggal_lahir" type="text" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" id="tanggal_lahir" class="form-control item" name="tanggal_lahir"  required readonly/>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                    disabled>LOADING......</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <input type="hidden" name="biodata_id" id="biodataidEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Nama <small class="text-danger">*</small></label>
                            <input type="text" id="nameEdit" name="name" class="form-control" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="username">Username <small class="text-danger">*</small></label>
                            <input type="text" id="userNameEdit" name="username" class="form-control" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="password">Password <small class="text-danger">*</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                    disabled>LOADING......</button>
            </div>
            </form>
        </div>
    </div>
</div>
