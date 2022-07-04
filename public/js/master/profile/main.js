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
        ajax: window.location.origin + '/master/data?type=profile',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'profiletext',
                name: 'profiletext'
            },
            {
                data: 'tujuantext',
                name: 'tujuantext',
            },
            {
                data: 'visitext',
                name: 'visitext',
            },
            {
                data: 'misitext',
                name: 'misitext',
            },
            {
                data: 'mototext',
                name: 'mototext',
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
                swal('nip sudah terdaftar', '', 'error');
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
        url: window.location.origin + '/master/data/show?type=profile',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idShow').empty();
            $('#namaShow').empty();
            $('#alamatShow').empty();
            $('#profileShow').empty();
            $('#tujuanShow').empty();
            $('#visiShow').empty();
            $('#misiShow').empty();
            $('#motoShow').empty();
            $('#idShow').val(id);
            $('#alamatShow').text(response['alamat']);
            $('#profileShow').text(response['profile']);
            $('#namaShow').text(response['nama']);
            $('#tujuanShow').text(response['tujuan']);
            $('#visiShow').text(response['visi']);
            $('#misiShow').text(response['misi']);
            $('#motoShow').text(response['moto']);
        }
    })
}

function edit(id) {
    $.ajax({
        url: window.location.origin + '/master/data/show?type=profile',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idEdit').empty();
            $('#namaEdit').empty();
            $('#alamatEdit').empty();
            $('#profileEdit').empty();
            $('#tujuanEdit').empty();
            $('#visiEdit').empty();
            $('#misiEdit').empty();
            $('#motoEdit').empty();
            $('#idEdit').val(id);
            $('#alamatEdit').val(response['alamat']);
            $('#profileEdit').val(response['profile']);
            $('#namaEdit').val(response['nama']);
            $('#tujuanEdit').val(response['tujuan']);
            $('#visiEdit').val(response['visi']);
            $('#misiEdit').val(response['misi']);
            $('#motoEdit').val(response['moto']);

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
                swal('nip sudah terdaftar', '', 'error');
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
                    data: { id: id, type: 'profile' },
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