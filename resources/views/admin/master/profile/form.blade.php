<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nama">nama <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="nama" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="alamat">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="alamat" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="profile">Profile <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="profile" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="tujuan">tujuan <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="tujuan" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="visi">Visi <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="visi" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="misi">Misi <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="misi" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="moto">Moto <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="moto" rows="5" data-rule="required" required></textarea>
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
                <form method="post" id="form-edit" action="{{ route('profile.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nama">nama <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="nama" id="namaEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="alamat">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="alamat" id="alamatEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="profile">Profile <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="profile" id="profileEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="tujuan">tujuan <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="tujuan" id="tujuanEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="visi">Visi <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="visi" id="visiEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="misi">Misi <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="misi" id="misiEdit" rows="5" data-rule="required" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="moto">Moto <small class="text-danger">*</small></label>
                            <textarea class="form-control" name="moto" id="motoEdit" rows="5" data-rule="required" required></textarea>
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
