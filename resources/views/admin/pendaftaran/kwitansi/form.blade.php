<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="dealer">Dealer <small class="text-danger">*</small></label>
                            <select name="dealer_id" class="form-control" required>
                                <option value="">Delaer</option>
                                @foreach ($dealer as $dealer)
                                <option value="{{ $dealer->id }}">{{ $dealer->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="merk">merk <small class="text-danger">*</small></label>
                            <select name="merk_id" class="form-control" required>
                                <option value="">merk</option>
                                @foreach ($merk as $merk)
                                <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="type">type <small class="text-danger">*</small></label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="">type/jenis</option>
                                @foreach ($tipe as $tipe)
                                <option value="{{ $tipe->id }}">{{ $tipe->type }}/{{ $tipe->jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="harga">Biaya Pendaftaran <small class="text-danger">*</small></label>
                            <input type="text" id="harga" class="form-control" disabled>
                        </div>

                        <div class="col-md-12">
                            <label for="warna">warna <small class="text-danger">*</small></label>
                            <input type="text" name="warna" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="tahun">tahun pembuatan <small class="text-danger">*</small></label>
                            <input type="text" name="tahun" onkeypress="return hanyaAngka(event)" maxlength="4" class="form-control" required>
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
                <form method="post" id="form-edit" action="{{ route('pendaftaran.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="delaer">Dealer <small class="text-danger">*</small></label>
                            <select name="dealer_id" id="dealer_idEdit"  class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="type">type/jenis <small class="text-danger">*</small></label>
                            <select id="type_idEdit" name="type_id" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="merk">merk <small class="text-danger">*</small></label>
                            <select name="merk_id" id="merk_idEdit" class="form-control" required>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="harga">Biaya Pendaftaran <small class="text-danger">*</small></label>
                            <input type="text" id="hargaEdit" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="warna">warna <small class="text-danger">*</small></label>
                            <input type="text" id="warnaEdit" name="warna" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="tahun">tahun pembuatan <small class="text-danger">*</small></label>
                            <input type="text" id="tahunEdit" onkeypress="return hanyaAngka(event)" maxlength="4" name="tahun" class="form-control" required>
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
