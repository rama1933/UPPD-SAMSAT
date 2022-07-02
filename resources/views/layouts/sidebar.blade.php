<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
           <div class="logo-image-small">
            <img style="width: 20px" src="{{ url('') }}/logo/prov.png">
          </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
            UUPD SAMSAT
           {{-- <div class="logo-image-big">
            <img src="{{ url('') }}/logo/prov.png">
          </div> --}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        @if (Auth::user()->hasRole('admin'))
        <ul class="nav">
            <li class="{{set_active('home.admin')}}">
                <a href="{{ route('home.admin') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Master</p>
                </a>
            </li>
            <li class="{{set_active('dealer.index')}}">
                <a href="{{ route('dealer.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>Dealer</p>
                </a>
            </li>
            <li class="{{set_active('merk.index')}}">
                <a href="{{ route('merk.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>Merk</p>
                </a>
            </li>
            <li class="{{set_active('tipe.index')}}">
                <a href="{{ route('tipe.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>Tipe/Jenis/Biaya</p>
                </a>
            </li>
            <li class="{{set_active('biodata.index')}}">
                <a href="{{ route('biodata.index') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Biodata</p>
                </a>
            </li>
            <li class="{{set_active('pegawai.index')}}">
                <a href="{{ route('pegawai.index') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Managemen User</p>
                </a>
            </li>
            <li class="{{set_active('user.index')}}">
                <a href="{{ route('user.index') }}">
                    <i class="nc-icon nc-lock-circle-open"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Data Pendaftaran</p>
                </a>
            </li>
            <li class="{{set_active('pendaftaranadmin.index')}}">
                <a href="{{ route('pendaftaranadmin.index') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Pendaftaran</p>
                </a>
            </li>
            <li class="{{set_active('pendaftaranadminselesai.index')}}">
                <a href="{{ route('pendaftaranadminselesai.index') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Pendaftaran Selesai</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Cetak Laporan</p>
                </a>
            </li>
            <li class="{{set_active('laporan.admin')}}">
                <a href="{{ route('laporan.admin') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Laporan</p>
                </a>
            </li>
            <li class="{{set_active('kwitansiadmin.index')}}">
                <a href="{{ route('kwitansiadmin.index') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Kwitansi Pembayaran</p>
                </a>
            </li>
        </ul>
        @endif

        @if (Auth::user()->hasRole('user'))
        <ul class="nav">
            <li class="{{set_active('home.user')}}">
                <a href="{{ route('home.user') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Data Pendaftaran</p>
                </a>
            </li>
            <li class="{{set_active('pendaftaran.index')}}">
                <a href="{{ route('pendaftaran.index') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Pendaftaran</p>
                </a>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <p>Cetak Laporan</p>
                </a>
            </li>
            <li class="{{set_active('laporan.user')}}">
                <a href="{{ route('laporan.user') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Laporan</p>
                </a>
            </li>

            <li class="{{set_active('kwitansi.index')}}">
                <a href="{{ route('kwitansi.index') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Tagihan Pembayaran</p>
                </a>
            </li>


        </ul>
        @endif
    </div>
</div>
