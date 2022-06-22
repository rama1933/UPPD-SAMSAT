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
<div class="row">
    <div class="col-md-12">
        <div class="slider-hero" >
            <div class="featured-carousel owl-carousel">
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url(logo/bg.jpg);">
                            <div class="text text-center">
                                <div class="row">

                                    <div class="update ml-auto mr-auto">
                                        <div class="author">
                                            <a href="#">
                                                <img style="width: 200px" class="avatar border-gray"
                                                    src="{{ asset('')}}paper/assets/img/user.png" alt="...">
                                                {{-- <h1 style="color: white" class="title">{{ auth()->user()->name }}</h1> --}}
                                            </a>
                                        </div>
                                        <button onclick="edit(' {{ auth()->user()->biodata_id }}')" data-toggle="modal"
                                            data-target="#modal-edit" class="btn btn-primary btn-round">Edit Profile</button>
                                        <a href="{{ route('pdf.userdetail',auth()->user()->biodata_id) }}" target="_blank"
                                            class="btn btn-success btn-round edit"> <i class="fa fa-print">
                                            </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-center justify-content-center"
                            style="background-image: url(logo/bg2.jpg);">
                            <div class="text" style="color: white">
                                <h2 style="text-align: center;font-weight: bold;">Visi :</h2>
                                <p style="font-weight: bold;">" Terwujudnya Pelayanan Prima Demi Kepuasan Masyarakat"</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url(logo/bg3.jpg);">
                            <div class="text" style="color: white">
                                <h2 style="text-align: center;font-weight: bold;">Misi :</h2>
                                <p style="font-weight: bold;">1. Menyediakan pelayanan kepada masyarakat pemilik kendaraan bermotor dalam pengurusan STNK, <br>
                                     pembayaran PKB/BBNKB dan
                                SWDKLLJ secara cepat, tepat dan benar serta berpedoman pada ketentuan yang berlaku.</p>
                                <p style="font-weight: bold;">
                                    2. Menyajikan data sebagai bahan infomasi tentang identitas kepemilikan kendaraan bermotor, <br> nilai PKB/BBNKB dan SWDKLLJ
                                    kendaraan bermotor yang diperlukan untuk pengambilan keputusan.
                                </p>
                                <p style="font-weight: bold;">3. Menyelenggarakan tertib administrasi dokumen secara baik, <br> benar dan akurat dalam rangka menjamin kepastian hukum
                                kepemilikan dan identitas data kendaraan bermotor</p>
                                <p style="font-weight: bold;">
                                   4. Melakukan upaya peningkatan untuk layanan melalui perbaikan sarana dan prasarana, <br> sistem komputerisasi serta
                                pengembangan SDM.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-5 text-center">
                <ul class="thumbnail">
                    <li class="active img"><a href="#"><img src="{{ asset('/logo/bg.jpg')}}" alt="Image" class="img-fluid" style="opacity: 0.6"><p style="z-index: 100;position: absolute;color: white;font-size: 18px;font-weight: bold;left: 440px;top: 20px;">Profile</p></a>
                    </li>
                    <li><a href="#"><img src="{{ asset('/logo/bg.jpg')}}" alt="Image" class="img-fluid" style="opacity: 0.6"><p style="z-index: 100;position: absolute;color: white;font-size: 18px;font-weight: bold;left: 545px;top: 20px;">Visi
                    </p></a></li>
                    <li><a href="#"><img src="{{ asset('/logo/bg.jpg')}}" alt="Image" class="img-fluid" style="opacity: 0.6"><p style="z-index: 100;position: absolute;color: white;font-size: 18px;font-weight: bold;left: 635px;top: 20px;">Misi
                    </p></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="max-height: 600px" class="d-block w-100" src="{{ asset('/logo/slide1.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img style="max-height: 600px" class="d-block w-100" src="{{ asset('/logo/slide2.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img style="max-height: 600px" class="d-block w-100" src="{{ asset('/logo/slide3.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img style="max-height: 600px" class="d-block w-100" src="{{ asset('/logo/slide4.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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
                <form method="post" id="form-edit" action="{{ route('dahsboard.update') }}"
                    enctype="multipart/form-data">
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
