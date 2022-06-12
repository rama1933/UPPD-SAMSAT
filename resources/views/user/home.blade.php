@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card card-user">
            <div class="image">
                <img src="{{ asset('/logo/bg.jpg')}}" alt="...">
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="#">
                        <img class="avatar border-gray" src="{{ asset('')}}paper/assets/img/user.png" alt="...">
                        <h5 class="title">{{ auth()->user()->name }}</h5>
                    </a>
                </div>
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button onclick="edit(' {{ auth()->user()->biodata_id }}')" data-toggle="modal" data-target="#modal-edit" class="btn btn-primary btn-round">Edit Profile</button>
                        <a href="{{ route('pdf.userdetail',auth()->user()->biodata_id) }}" target="_blank" class="btn btn-success btn-round edit"> <i class="fa fa-print">
                            </i></a>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <hr>
                <div class="button-container">
                    {{-- <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                            <h5>12<br><small>Files</small></h5>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                            <h5>2GB<br><small>Used</small></h5>
                        </div>
                        <div class="col-lg-3 mr-auto">
                            <h5>24,6$<br><small>Spent</small></h5>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 text-xl font-weight-bold text-uppercase text-center">
                            Selamat Datang Di UPPD Samsat Kandangan</div>

                    </div>
                    <div class="col-auto">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Edit Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('dahsboard.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nik">NIK <small class="text-danger">*</small></label>
                            <input type="text" id="nikEdit" name="nik" class="form-control"
                                onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" id="namaEdit" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" id="nohpEdit" name="no_hp" class="form-control"
                                onkeypress="return hanyaAngka(event)" required>
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
                            <input type="date" class="form-control" id="tanggallahirEdit" name="tanggal_lahir"
                                required />
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

@include('admin.master.jenis.form')
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
        });
    });

    function edit(id) {
    $.ajax({
    url: window.location.origin + '/show?type=biodata',
    method: "GET",
    data: { id: id, _token: '{{ csrf_token() }}' },
    success: function(response) {
    console.log(response)
    $('#idEdit').empty();
    $('#namaEdit').empty();
    $('#nikEdit').empty();
    $('#nohpEdit').empty();
    $('#alamatEdit').empty();
    $('#ttlEdit').empty();
    $('#idEdit').val(id);
    $('#nikEdit').val(response['nik']);
    $('#nohpEdit').val(response['no_hp']);
    $('#alamatEdit').val(response['alamat']);
    $('#tempatlahirEdit').val(response['tempat_lahir']);
    $('#tanggallahirEdit').val(response['tanggal_lahir']);
    $('#namaEdit').val(response['nama']);
    }
    })
    }
    $('#form-edit').on('submit', function(e) {
    e.preventDefault()

    $("#form-edit").ajaxSubmit({
    beforeSend: function() {
    $('#tombol').hide();
    $('#loading').show();
    },
    success: function(res) {
    if (res.status == "failed") {
    swal('NIK sudah terdaftar', '', 'error');
    $('#tombol').show();
    $('#loading').hide();
    } else if (res.status = "success") {
    $('#table').DataTable().ajax.reload();
    // location.reload();
    swal('Data Berhasil Di Simpan', '', 'success');
    //set semua ke default
    $("#form-edit input:not([name='_token']").val('')
    $("#modal-edit").modal('hide')
    $('#tombol').show();
    $('#loading').hide();
    }
    }
    })
    return true;

    })
</script>
{{-- <script src="{{asset('js/master/bidang/main.js')}}"></script> --}}
@endsection
