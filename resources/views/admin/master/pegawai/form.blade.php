<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nip">NIP <small class="text-danger">*</small></label>
                            <input type="text" name="nip" class="form-control" onkeypress="return hanyaAngka(event)" required>
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
                            <label for="jabatan">Jabatan <small class="text-danger">*</small></label>
                            <input type="text" name="jabatan"  class="form-control" required>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="merk">jk <small class="text-danger">*</small></label>
                            <select name="jk" class="form-control" required>
                                <option value="">Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
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
                <form method="post" id="form-edit" action="{{ route('pegawai.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nip">NIP <small class="text-danger">*</small></label>
                            <input type="text" name="nip" class="form-control" id="nipEdit" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="namaEdit" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" name="no_hp" id="nohpEdit" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="jabatan">Jabatan <small class="text-danger">*</small></label>
                            <input type="text" name="jabatan" id="jabatanEdit" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="merk">Jenis Kelammin <small class="text-danger">*</small></label>
                            <select name="jk" id="jkEdit" class="form-control" required>
                            </select>
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
                                        <div style="padding-left: 50px" class="col-3">NIP</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="nipShow"></div>
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
                                        <div style="padding-left: 50px" class="col-3">Jabatan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8" id="jabatanShow"></div>
                                    </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div style="padding-left: 50px" class="col-3">Jenis Kelamin</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8" id="jkShow"></div>
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
