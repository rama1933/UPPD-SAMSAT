<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('biodata.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nik">NIK <small class="text-danger">*</small></label>
                            <input type="text" name="nik" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" name="no_hp" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="alamat" rows="5"  data-rule="required" required></textarea>
                        </div>

                        <div class="form-group col-lg-12">
                        <label for="tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="tempat_lahir" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tanggal_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="date" class="form-control" name="tanggal_lahir" required />
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
</div>

<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('biodata.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nik">NIK <small class="text-danger">*</small></label>
                            <input type="text" id="nikEdit" name="nik" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" id="namaEdit" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" id="nohpEdit" name="no_hp" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" id="alamatEdit" name="alamat" rows="5" data-rule="required"
                                required></textarea>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="tempatlahirEdit" name="tempat_lahir" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tanggal_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="date" class="form-control" id="tanggallahirEdit" name="tanggal_lahir" required />
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
</div>

<div class="modal fade" role="dialog" id="modal-show">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Detail Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-show" action="{{ route('tipe.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idShow">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table" id="tableShow">
                                <tr>
                                    <td>
                                    <div class="row">
                                        <div style="padding-left: 50px" class="col-3">NIK</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="nikShow"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="row">
                                        <div style="padding-left: 50px" class="col-3">Nama</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="namaShow"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="row">
                                        <div style="padding-left: 50px" class="col-3">No Hp</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="nohpShow"></div>
                                    </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="row">
                                        <div style="padding-left: 50px" class="col-3">Alamat</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="alamatShow"></div>
                                    </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="row">
                                        <div style="padding-left: 50px" class="col-3">TTL</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="ttlShow"></div>
                                    </div>
                                     </td>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>
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
