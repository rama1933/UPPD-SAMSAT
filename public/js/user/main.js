$(document).ready(function() {
    datatable();
});

function AddModal() {
    $('#addModal').modal('show');
}

function datatable() {
    $('#table')
        .DataTable()
        .destroy();

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            processing: "<img src='" + window.origin + "/img/805.gif'> Memuat Data"
        },
        ajax: window.location.origin + '/user/data',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'button',
                name: 'button'
            }
        ]
    });
}

$('#form-create').on('submit', function(e) {
    e.preventDefault()

    $("#form-create").ajaxSubmit({
        beforeSend: function() {
            $('#tombol').hide();
            $('#loading').show();
        },
        success: function(res) {
            if (res.status == "failed") {
                swal('Username sudah terdaftar', '', 'error');
                $('#tombol').show();
                $('#loading').hide();
            } else if (res.status == "required") {
                swal('Form tidak boleh kosong', '', 'error');
                $('#tombol').show();
                $('#loading').hide();
            } else if (res.status = "success") {
                $('#table').DataTable().ajax.reload();
                // location.reload();
                swal('Data Berhasil Di Simpan', '', 'success');
                //set semua ke default
                $("#form-create input:not([name='_token']").val('')
                $("#modal-create").modal('hide')
                $('#tombol').show();
                $('#loading').hide();
            }
        }
    })
    return true;

})

function edit(id) {
    $.ajax({
        url: window.location.origin + '/user/show',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idEdit').empty();
            $('#biodataidEdit').empty();
            $('#nameEdit').empty();
            $('#userNameEdit').empty();
            $('#idEdit').val(id);
            $('#nameEdit').val(response['name']);
            $('#userNameEdit').val(response['username']);
            $('#biodataidEdit').val(response['biodata_id']);
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
            $('#table').DataTable().ajax.reload();
            // location.reload();
            swal('Data Berhasil Di Simpan', '', 'success');
            //set semua ke default
            $("#form-edit input:not([name='_token']").val('')
            $("#modal-edit").modal('hide')
            $('#tombol').show();
            $('#loading').hide();
        }
    })
    return true;

})


function deletebtn(id, biodata_id) {
    var token = '{{ csrf_token() }}'
    swal({
            title: 'Anda Yakin Ingin Menghapus Data?',
            text: '',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: window.location.origin + '/user/delete',
                    method: "POST",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { id: id, biodata_id: biodata_id, type: 'tipe' },
                    success: function(results) {
                        $('#table').DataTable().ajax.reload();
                        swal('Berhasil Menghapus Data', {
                            icon: 'success',
                        });
                    }
                });

            } else {
                swal('Data Batal Dihapus');
            }
        });
}

$('#periksa').on('click', function(e) {
    e.preventDefault()
    let nik = $("#nik").val()
        //  console.log(nik)

    $.ajax({
        url: window.location.origin + '/user/filter',
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