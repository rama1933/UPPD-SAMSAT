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
        ajax: window.location.origin + '/admin/pendaftaran/data?type=selesai',
        columns: [{
                data: 'kwitansi',
                name: 'kwitansi'
            },
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'dealer',
                name: 'dealer'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'merk',
                name: 'merk'
            },
            {
                data: 'warna',
                name: 'warna'
            },
            {
                data: 'tahun',
                name: 'tahun'
            },
            {
                data: 'harga',
                name: 'harga'
            },
            {
                data: 'tanggal',
                name: 'tanggal'
            },
            {
                data: 'nopol',
                name: 'nopol'
            },
            {
                data: 'tgl_stnk',
                name: 'tgl_stnk'
            },
            {
                data: 'tgl_pajak',
                name: 'tgl_pajak'
            },

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
                $("#form-create input:not([name='_token'],[name='user_id'],[name='biodata_id']").val('')
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
        url: window.location.origin + '/pendaftaran/show',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idEdit').empty();
            $('#warnaEdit').empty();
            $('#tahunEdit').empty();
            $('#dealer_idEdit').removeAttr("required");
            $('#merk_idEdit').removeAttr("required");
            $('#type_idEdit').removeAttr("required");
            $('#dealer_idEdit').empty();
            $('#hargaEdit').empty();
            $('#merk_idEdit').empty();
            $('#type_idEdit').empty();
            $('#idEdit').val(id);
            $('#warnaEdit').val(response['warna']);
            $('#tahunEdit').val(response['tahun']);
            $('#hargaEdit').val(response.type.harga);
            $('#dealer_idEdit').append('<option value="' + response.dealer.id + '">' + response.dealer.nama + '</option>');
            $('#merk_idEdit').append('<option value="' + response.merk.id + '">' + response.merk.nama + '</option>');
            $('#type_idEdit').append('<option value="' + response.type.id + '">' + response.type.type + '/' + response.type.jenis + '</option>');
            $.each(response.dealerall, function(key, val) {
                $('select[id="dealer_idEdit"]').append('<option value="' + val.id + '">' + val.nama + '</option>');
            })
            $.each(response.merkall, function(key, val) {
                $('select[id="merk_idEdit"]').append('<option value="' + val.id + '">' + val.nama + '</option>');
            })
            $.each(response.typeall, function(key, val) {
                $('select[id="type_idEdit"]').append('<option value="' + val.id + '">' + val.type + '/' + val.jenis + '</option>');
            })
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
                    url: window.location.origin + '/pendaftaran/delete',
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

$('#type_id').on('change', function(e) {
    e.preventDefault()
    let id = $("#type_id").val()
        //  console.log(nik)

    $.ajax({
        url: window.location.origin + '/pendaftaran/harga',
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { id: id },
        success: function(res) {

            $('#harga').empty();
            $('#harga').val(res['harga']);
        }
    });
})

$('#type_idEdit').on('change', function(e) {
    e.preventDefault()
    let id = $("#type_idEdit").val()
        //  console.log(nik)

    $.ajax({
        url: window.location.origin + '/pendaftaran/harga',
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { id: id },
        success: function(res) {

            $('#hargaEdit').empty();
            $('#hargaEdit').val(res['harga']);
        }
    });
})