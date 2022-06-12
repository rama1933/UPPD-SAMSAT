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
        ajax: window.location.origin + '/master/data?type=biodata',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'no_hp',
                name: 'no_hp'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'ttl',
                name: 'ttl',
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
            console.log(res)
            if (res.status == "failed") {
                swal('NIK sudah terdaftar', '', 'error');
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

function show(id) {
    $.ajax({
        url: window.location.origin + '/master/data/show?type=biodata',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idShow').empty();
            $('#namaShow').empty();
            $('#nikShow').empty();
            $('#nohpShow').empty();
            $('#alamatShow').empty();
            $('#ttlShow').empty();
            $('#idShow').val(id);
            $('#nikShow').text(response['nik']);
            $('#nohpShow').text(response['no_hp']);
            $('#alamatShow').text(response['alamat']);
            $('#ttlShow').text(response['ttl']);
            $('#namaShow').text(response['nama']);
        }
    })
}

function edit(id) {
    $.ajax({
        url: window.location.origin + '/master/data/show?type=biodata',
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


function deletebtn(id) {
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
                    url: window.location.origin + '/master/data/delete',
                    method: "POST",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { id: id, type: 'biodata' },
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