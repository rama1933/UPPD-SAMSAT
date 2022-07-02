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
        ajax: window.location.origin + '/master/data?type=pegawai',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nip',
                name: 'nip'
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
                data: 'jabatan',
                name: 'jabatan'
            },
            {
                data: 'jk',
                name: 'jk',
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
        url: window.location.origin + '/master/data/show?type=pegawai',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idShow').empty();
            $('#namaShow').empty();
            $('#nipShow').empty();
            $('#nohpShow').empty();
            $('#jabatanShow').empty();
            $('#jkShow').empty();
            $('#idShow').val(id);
            $('#nipShow').text(response['nip']);
            $('#nohpShow').text(response['no_hp']);
            $('#namaShow').text(response['nama']);
            $('#jabatanShow').text(response['jabatan']);
            $('#jkShow').text(response['jk']);
        }
    })
}

function edit(id) {
    $.ajax({
        url: window.location.origin + '/master/data/show?type=pegawai',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            console.log(response)
            $('#idEdit').empty();
            $('#namaEdit').empty();
            $('#nipEdit').empty();
            $('#nohpEdit').empty();
            $('#jabatanEdit').empty();
            $('#jkEdit').empty();
            $('#idEdit').val(id);
            $('#nipEdit').val(response['nip']);
            $('#nohpEdit').val(response['no_hp']);
            $('#namaEdit').val(response['nama']);
            $('#jabatanEdit').val(response['jabatan']);
            if (response['jk'] == 'laki-laki') {
                $('#jkEdit').append('<option value="laki-laki">Laki-laki</option><option value="perempuan">Perempuan</option>');
            } else {
                $('#jkEdit').append('<option value="perempuan">Perempuan</option><option value="laki-laki">Laki-laki</option>');
            }

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
                    data: { id: id, type: 'pegawai' },
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