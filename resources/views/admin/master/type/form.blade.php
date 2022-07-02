<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('tipe.store') }}" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                    <div class="col-md-12">
                        <label for="type">Tipe <small class="text-danger">*</small></label>
                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="jenis">Jenis <small class="text-danger">*</small></label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="harga">Biaya Pembuatan <small class="text-danger">*</small></label>
                        <input type="text" name="harga" id="rupiah" class="form-control" required>
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
                <form method="post" id="form-edit" action="{{ route('tipe.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="type">Tipe <small class="text-danger">*</small></label>
                            <input type="text" id="typeEdit" name="type" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="jenis">Jenis <small class="text-danger">*</small></label>
                            <input type="text" id="jenisEdit" name="jenis" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="harga">Biaya Pembuatan <small class="text-danger">*</small></label>
                            <input type="text" id="hargaEdit" name="harga" class="form-control" required>
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
