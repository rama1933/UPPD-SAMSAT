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

    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
        padding-left: 20px;
    }

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
                UPPD SAMSAT KANDANGAN
            </h2>
            {{-- <h3 style="margin-top: -15px">
                DINAS KOMUNIKASI DAN INFORMATIKA
            </h3>
            <h6 style="margin-top: -15px">
                Jalan Aluh Idut No. 66 A Kandangan Kab. Hulu Sungai Selatan
                KANDANGAN 71211
            </h6> --}}
        </div>
    </div>
    <hr style="margin-top: -10px">
    <h3 style="text-align: center;">DATA USER</h3>
    <table id="table" style="width: 100%">
        <tbody>
            @foreach ($user as $user)
            <tr>
                <th style="text-align: left">Username</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $user->username }}</td>
            </tr>
            @endforeach
            @foreach ($data as $data)
            @php
            $date = strtotime($data->tanggal_lahir);
            @endphp
            <tr>
                <th style="text-align: left">Nik</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->nik }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Nama</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->nama }}</td>
            </tr>
            <tr>
                <th style="text-align: left">No Hp</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <th style="text-align: left">TTL</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                @if ($data->tempat_lahir == null or $data->tanggal_lahir
                == null)
                @else
                {{ $data->tempat_lahir }}, {{
                date('d-m-Y', $date)}}
                @endif
            </td>
            </tr>
            <tr>
                <th style="text-align: left">Alamat</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->alamat }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>
