<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('') }}paper/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}login-form/dist/style.css">
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <section id="formHolder">

            <div class="row">

                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    {{-- <a href="#" class="logo">MR <span>.</span></a> --}}

                    <div class="heading">
                        <hr>
                        <p >Selamat Datang di-</p>
                        <h1>Aplikasi Pendaftaran Kendaraan Bermotor</h1>
                        <p style="margin-top: -20px">UPPD SAMSAT KANDANGAN</p>
                        <hr>
                    </div>

                    {{-- <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="#" class="profile">Your Profile</a>
                    </div> --}}
                </div>


                <!-- Form Box -->
                <div class="col-sm-6 form">

                    <!-- Login Form -->
                    <div class="login form-peice switched">
                   <form class="login-form" id="form-create" method="POST" action="{{ route('register.store') }}">
                    @csrf

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username" id="name" class="name" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="password" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-10">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" required>
                            </div>
                            <div class="col-md-2" style="margin-top: 30px">
                                <button id="periksa" class="btn btn-md btn-primary ">Cari</button>
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="nama" name="nama" id="nama" readonly>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tanggal Lahir</label>
                            <input id="tanggal_lahir" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="tanggal_lahir" name="tanggal_lahir" readonly />
                        </div>

                        <div class="CTA">
                            <input type="submit" value="Daftar" id="submit">
                            <a href="#" class="switch">Login</a>
                        </div>
                    </form>
                    </div><!-- End Login Form -->


                    <!-- Signup Form -->
                    <div class="signup form-peice">
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            <div class="col-md-12" style="text-align: center;margin-top:-100px">
                                <hr>
                                <img class="mb-3" style="width: 100px" alt="100x100" src="{{ url('') }}/logo/prov.png"
                                    data-holder-rendered="true">

                                <h4>SILAHKAN LOGIN</h4>
                                <hr>
                            </div>


                            @csrf
                            <div class="form-group">
                                <label for="loginemail">Username</label>
                                <input type="text" name="username" value="{{ old('username') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="password" id="loginPassword" required>
                            </div>

                            <div class="CTA">
                                <input type="submit" value="Login">
                                <a href="#" class="switch">Daftar</a>
                            </div>
                        </form>

                    </div><!-- End Signup Form -->
                </div>
            </div>

        </section>


        <footer>

        </footer>

    </div>
    <!-- partial -->
    <script src="{{ asset('') }}paper/assets/js/core/jquery.min.js"></script>
    <script src="{{ asset('') }}paper/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('plugins/jquery.form.min.js') }}"></script>
    <script src="{{ asset('') }}login-form/dist/script.js"></script>
    <script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script>
        $('#periksa').on('click', function(e) {
        e.preventDefault()
        let nik = $("#nik").val()
        // console.log(nik)

        $.ajax({
        url: window.location.origin + '/filter',
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { nik: nik },
        success: function(res) {
        if (res.status == 'empty') {
        swal('Data Tidak Ditemukan Silahkan Isi Biodata', '', 'error');
        $('#nama').prop("readonly", false);
        $('#no_hp').prop("readonly", false);
        $('#alamat').prop("readonly", false);
        $('#no_hp').prop("readonly", false);
        $('#tempat_lahir').prop("readonly", false);
        $('#tanggal_lahir').prop("readonly", false);
        } else {
        swal('Data Ditemukan', '', 'success');
        $('#nama').prop("readonly", false);
        $('#no_hp').prop("readonly", false);
        $('#alamat').prop("readonly", false);
        $('#no_hp').prop("readonly", false);
        $('#tempat_lahir').prop("readonly", false);
        $('#tanggal_lahir').prop("readonly", false);
        $('#nama').empty();
        $('#nohp').empty();
        $('#alamat').empty();
        $('#tempat_lahir').empty();
        $('#tanggal_lahir').empty();
        $('#no_hp').val(res['no_hp']);
        $('#alamat').val(res['alamat']);
        $('#tempat_lahir').val(res['tempat_lahir']);
        $('#tanggal_lahir').val(res['tanggal_lahir']);
        $('#nama').val(res['nama']);
        }
        }
        });

        })

        $('#form-create').on('submit', function(e) {
        e.preventDefault()

        $("#form-create").ajaxSubmit({
        success: function(res) {
        if (res.status == "failed") {
        swal('Username sudah terdaftar', '', 'error');
        } else if (res.status == "required") {
        swal('Form tidak boleh kosong', '', 'error');

        } else if (res.status = "success") {

        // location.reload();
        swal('Data Berhasil Di Simpan', '', 'success');
        //set semua ke default
        $("#form-create input:not([name='_token']").val('')
        setTimeout(location.reload.bind(location), 1000);

        }
        }
        })
        return true;

        })
    </script>

</body>

</html>
