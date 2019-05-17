$(document).ready(function () {
    get_data();
    $('#btnTambah').click(function (e) {
        e.preventDefault();
        $('#validation').html('');
        $('#tambah-ta').modal({
            keyboard: false,
            show: true
        });
    });
    $('#btnSimpan').click(function (e) {
        $('input').prop('disabled', true);
        $('button').prop('disabled', true);
        $('#layout_ta').removeClass('has-error');
        if ($('#ta').val() == '') {
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Tahun Ajaran tidak boleh kosong. </div>`);
            $('#layout_ta').addClass('has-error');
        } else {
            tambah_data();
        }
    });
    $('#ta').keyup(function (e) {
        $('#validation').html('');
        $('#layout_ta').removeClass('has-error');
    });
});

function get_data() {
    var table = $('#data-ta').DataTable({
        "ajax": {
            url: get_url,
            type: "get",
            dataSrc: 'ta'
        },
        "columns": [{
            data: 'tahun_ajaran'
        },
        {
            "data": 'sta_aktif',
            "mRender": function (data) {
                if (data == '1') {
                    var status = 'Sedang Aktif';
                    return `<span class="text-center label label-success label-bordered">` + status + `</span>`;
                } else if (data == '0') {
                    var status = 'Tidak Aktif';
                    return `<span class="text-center label label-danger label-bordered">` + status + `</span>`;
                }

            }
        },
        {
            "data": 'id_ta',
            "mRender": function (data) {
                var id_ta = "'" + data + "'";
                return `
                    <center>
                        <button type="button" class="btn btn-primary btn-outline btn-rounded" onclick="update_data(` + id_ta + `)"><i class="fa fa-pencil"></i>  Ubah Status</button>
                        <button type="button" class="btn btn-danger btn-outline btn-rounded" onclick="delete_data(` + id_ta + `)"><i class="fa fa-trash"></i> </button>
                    </center>
                `;
            }
        }
        ]
    });
    setInterval(() => {
        table.ajax.reload(null, false);
    }, 3000);
}

function update_data(data) {

    $.ajax({
        type: "post",
        url: update,
        data: {
            'id_ta': data
        },
        dataType: "json",
        success: function (response) {
            if (response.code == '1') {
                swal("Berhasil!", "Perubahan Status aktif berhasil.", "success");
            } else if (response.code == '0') {
                swal("Gagal!", "Perubahan Status aktif gagal di lakukan.", "error");
            }
        }
    });
}

function tambah_data() {
    $.ajax({
        type: "post",
        url: create_url,
        data: {
            'ta': $('#ta').val()
        },
        dataType: "json",
        success: function (response) {
            if (response.code == '1') {
                $('input').prop('disabled', false);
                $('button').prop('disabled', false);
                $.toast({
                    heading: 'Tambah Tahun Ajaran Berhasil',
                    text: 'Berhasil menambah tahun ajaran baru',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                });
                $('#tambah-ta').modal('hide');
            } else {
                $('input').prop('disabled', false);
                $('button').prop('disabled', false);
                $.toast({
                    heading: 'Tahun Ajaran Gagal',
                    text: 'Gagal Menambah Tahun Ajaran baru, Silahkan coba lagi',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                    
                });
            }
        }
    });
}

function delete_data(data) { 
    swal({   
        title: "Apa anda yakin?",   
        text: "Semua data yang berkaitan dengan tahun ajaran tersebut akan terhapus juga!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya",   
        cancelButtonText: "Batal",   
        closeOnConfirm: false,   
        closeOnCancel: true 
    }, function(isConfirm){   
        if (isConfirm) {
            $.ajax({
                type: "post",
                url: delete_url,
                data: {
                    "id_ta" : data
                },
                dataType: "json",
                success: function (response) {
                    if(response.success=="1"){
                        swal("Berhasil!", "Tahun Ajaran telah terhapus.", "success");   
                    }else{
                        swal("Gagal!", "Penghapusan Tahun Ajaran gagal di lakukan.", "error");   
                    }
                }
            });     
            
        } 
    });
}