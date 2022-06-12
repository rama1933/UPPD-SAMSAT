@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="row">
    {{-- <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-globe text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Capacity</p>
                            <p class="card-title">150GB
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i>
                    Update Now
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-paper text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Jumlah</p>
                            <p class="card-title">{{ $jumlah_pendaftaran }}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    Jumlah Pendaftaran
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-refresh-69 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Jumlah</p>
                            <p class="card-title">{{ $jumlah_proses }}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    Belum Verifikasi
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-check-2 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Jumlah</p>
                            <p class="card-title">{{ $jumlah_selesai }}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                   <i class="nc-icon nc-chart-bar-32"></i>
                Selesai
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
   <div class="card-body"
        style="background-image: url('{{ asset('/logo/bg.jpg')}}');background-size: 100% 100%;background-repeat: no-repeat;height:500px">
        <div class="row">
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
        <!-- /.card-body -->
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
</script>
<script src="{{asset('js/master/bidang/main.js')}}"></script>
@endsection
