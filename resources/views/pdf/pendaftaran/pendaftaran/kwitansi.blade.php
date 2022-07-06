<!DOCTYPE html>
<html>

<head>
    <title>UPPD SAMSAT</title>
</head>
<style>
    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
    }

    .left {
        width: 10%;
    }

    .right {
        width: 90%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        clear: both;
    }

    /* table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
        padding-left: 20px;
    } */

    header {
        position: fixed;
        top: -30px;
        left: 0px;
        right: 0px;
    }

    footer {
        position: fixed;
        bottom: -10px;
        left: 0px;
        right: 0px;
    }
</style>

<body>
    <header>
        <hr>
    </header>
    <footer>
        <hr>
    </footer>
   <div class="row" style="text-align: center">
    <div class="column left">
        <img src="{{  public_path() }}/logo/prov.png" style="width:50px">
    </div>
    <div class="column right">
        <h2 style="margin-top: 10px">
            PEMERINTAH PROVINSI KALIMANTAN SELATAN
            BADAN KEUANGAN DAERAH
            UNIT PELAYANAN PENDAPATAN DAERAH (UPPD)
            KANDANGAN
        </h2>
        <h6 style="margin-top: -15px">
            Jl. Jend. Sudirman Km. 3,5 RT.2 RW.1 Desa Karasikan Kec. Sungai Raya Kandangan 71271
            Telp./Fax (0517) 21237 Email : uppdkandangan.dispenda@gmail.com
        </h6>
        {{-- <h6 style="margin-top: -15px">
            Jalan Aluh Idut No. 66 A Kandangan Kab. Hulu Sungai Selatan
            KANDANGAN 71211
        </h6> --}}
    </div>
</div>
    <hr style="margin-top: -10px">
    <h5 style="text-align: center;margin-top: 10px">KWITANSI TAGIHAN BIAYA PEMBUATAN</h5>
    <hr>
    <table id="table" style="width: 100%">
        <tbody>
            @foreach ($data as $data)
            <tr>
                <th style="text-align: left">Atas nama</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->biodata->nama }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Jumlah uang</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->type->harga }}</td>
            </tr>
            <tr>
                <th style="text-align: center" colspan="3"> <hr><h5>UNTUK PEMBAYARAN</h5> <hr></th>
                {{--  <td style="text-align: center">:</td>
                <td style="padding-left: 10px">  --}}

                </td>
            </tr>
            <tr>
                <th style="text-align: left">Keterangan</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    Pendaftaran Kendaraan Baru
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Tipe / Jenis</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->type->type }} / {{ $data->type->jenis }}/ {{ $data->type->merk }}
                </td>
            </tr>

            {{--  <tr>
                <th style="text-align: left">Merk</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->merk->nama }}
                </td>
            </tr>  --}}

            <tr>
                <th style="text-align: left">Warna</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->warna }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tempat Pembelian / Dealer</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->dealer->nama }}
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Tahun Pembuatan</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->tahun }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Tanggal Pendaftaran </th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ date('d-m-Y',strtotime($data->tanggal)) }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>
    <hr>
    <table id="table" style="width: 100%;;
        border-collapse: collapse;
        padding: 10px;">
        <tbody>
            @foreach ($data2 as $data2)
                <td style="padding-left: 40px;padding-right: 40px;border: 4px solid;width: 30%;text-align:center"><h3>{{ $data2->type->harga }}</h3></td>
                <td>
                     <div class="row" style="text-align: center;float:right;width: 40%;">
                    <div>
                        {{--  <table style="border: none">
                            <tr style="border: none">
                                <td style="border: none">Dikeluarkan</td>
                                <td style="border: none">:</td>
                                <td style="border: none">Dikandangan</td>
                            </tr>
                            <tr>
                                <td style="border: none">Pada Tanggal</td>
                                <td style="border: none">:</td>
                                <td style="border: none">{{ date('d-m-Y') }}</td>
                            </tr>
                        </table>  --}}
                        {{--  <hr>  --}}
                        <h4 style="margin-bottom: 60px;margin-top: -5px">
                            Kandangan, {{ date('d-m-Y') }} <br>
                            Mengetahui,
                        </h4>
                        <h4 style="margin-bottom: -6px">
                           {{ $data2->biodata->nama }}
                        </h4>
                        <hr>
                       NIK : {{ $data2->biodata->nik }}
                        {{--  <h6 style="margin-top: -6px">
                            Kepala UPPD Kandangan
                            kasi pelayanan PKB BBNKB
                        </h6>  --}}
                    </div>
                </div>
            </td>
            @endforeach

        </tbody>

    </table>
    <p>* Lunasi Tagihan Pemabayaran Untuk Meneyelesaikan Pendaftaran</p>

</body>

</html>
