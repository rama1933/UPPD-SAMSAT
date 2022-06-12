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
                            <label for="jenis">jenis <small class="text-danger">*</small></label>
                            <select name="jenis_id" class="form-control" required>
                                <option value="">Jenis</option>
                                @foreach ($jenis as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
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
                            <select name="type_id" class="form-control" required>
                                <option value="">type</option>
                                @foreach ($tipe as $tipe)
                                <option value="{{ $tipe->id }}">{{ $tipe->nama }}</option>
                                @endforeach
                            </select>
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
                <h5 class="modal-title mb-2">Verifikasi</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('pendaftaranadmin.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                       <div class="form-group col-lg-12">
                           <span>No Polisi</span>
                        <input type="text" id="nopolEdit" class="form-control" name="nopol" placeholder="No Polisi" data-rule="minlen:4" required />
                    </div>

                    <div class="form-group col-lg-12">
                        <span>Tanggal STNK</span>
                        <input type="date" id="tglstnkEdit" class="form-control" name="tgl_stnk" placeholder="" required />
                    </div>

                    <div class="form-group col-lg-12">
                        <span>Tanggal Pajak</span>
                        <input type="date" id="tglpajakEdit" class="form-control" name="tgl_pajak" placeholder="" required />
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
