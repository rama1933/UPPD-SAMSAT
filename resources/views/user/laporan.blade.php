@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/animate.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/style.css">

@endsection

@section('content')
<div class="row">
<div class="col-xl-12 col-md-12 mb-2">
    <div class="card  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <h5>Cetak Laporan Pendaftaran</h5>
                            </td>
                            <td>
                                <a href="{{route('pdf.pendaftaran')}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <h5>Cetak Biodata</h5>
                        </td>
                        <td><a href="{{ route('pdf.userdetail',auth()->user()->biodata_id) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@include('admin.master.jenis.form')
@endsection

@section('custom_js')

{{-- <script src="{{ asset('') }}carousel/js/jquery.min.js"></script> --}}
<script src="{{ asset('') }}carousel/js/popper.js"></script>
<script src="{{ asset('') }}carousel/js/bootstrap.min.js"></script>
<script src="{{ asset('') }}carousel/js/owl.carousel.min.js"></script>
<script src="{{ asset('') }}carousel/js/main.js"></script>
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
