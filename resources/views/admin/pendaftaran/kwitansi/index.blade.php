@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title"> TABEL PENDAFTARAN</h4>
            </div>
            {{--  <div class="col-6">
                <button data-toggle="modal" data-target="#modal-create" class="btn btn-md btn-primary float-right"><i class="fa fa-plus"></i>
                    Tambah</button>
            </div>  --}}
        </div>

        <hr>
    </div>
    <div class="card-body">
        {{--  <div class="ml-md-auto">
        <a href="{{ route('pdf.pendaftaran') }}" target="_blank" title="Unduh Dokumen (PDF)"
    class="btn btn-md btn-success mb-3"><i class="fa fa-print"></i> Cetak</a>
        </div>  --}}
        <div class="table-responsive">
            <table class="table" id="table">
                <thead class=" text-primary">
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Kwitansi Pembayaran
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        No
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Dealer
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tipe/Jenis/Merk
                    </th>
                    {{--  <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Merk
                    </th>  --}}
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Warna
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tahun Pembuatan
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Biaya Pendaftaran
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tangal Pendaftaran
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Nopol
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tanggal STNK
                    </th>
                    <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tanggal Pajak
                    </th>
                    {{--  <th style="padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Aksi
                    </th>  --}}

                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.pendaftaran.kwitansi.form')
@endsection

@section('custom_js')
<script >
    $(document).ready(function() {
        $('#table').DataTable({
        });
    });
    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode> 57))

        return false;
        return true;
        }
</script>
<script src="{{asset('js/kwitansi/admin/main.js')}}"></script>
@endsection
