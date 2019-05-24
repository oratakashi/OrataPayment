$(document).ready(function () {
    get_data();
    $('#btnTambah').click(function (e) {
        e.preventDefault();
        $('#validation').html('');
        $('#tambah-kelas').modal({
            keyboard: false,
            show: true
        });
    });
    $('#btnSimpan').click(function (e) {
        $('input').prop('disabled', true);
        $('button').prop('disabled', true);
        $('#layout_kelas').removeClass('has-error');
        if ($('#kelas').val() == '') {
            $('input').prop('disabled', false);
            $('button').prop('disabled', false)
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Kelas tidak boleh kosong. </div>`);
            $('#layout_kelas').addClass('has-error');
        } else {
            tambah_data();
        }
    });
    $('#kelas').keyup(function (e) {
        $('#validation').html('');
        $('#layout_kelas').removeClass('has-error');
    });
});

function get_data(){
    var table = $('#data-kelas').DataTable({
        "ajax": {
            url: get_url,
            type: "get",
            dataSrc: 'kelas'
        },
        "columns": [{
            data: 'kelas'
        },
        {
            "data": 'id_kelas',
            "mRender": function (data) {
                var id_kelas = "'" + data + "'";
                return `
                    <button type="button" class="btn btn-danger btn-outline btn-rounded" onclick="delete_data(` + id_kelas + `)"><i class="fa fa-trash"></i> Hapus Kelas</button>
                `;
            }
        }
        ]
    });
    setInterval(() => {
        table.ajax.reload(null, false);
    }, 3000);
}

function tambah_data(){
    $.ajax({
        type: "post",
        url: create_url,
        data: {
            'kelas' : $('#kelas').val()
        },
        dataType: "json",
        success: function (response) {
            if (response.code == '1') {
                $('input').prop('disabled', false);
                $('button').prop('disabled', false);
                $.toast({
                    heading: 'Tambah Kelas Berhasil',
                    text: 'Berhasil menambah kelas baru',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                });
                $('#tambah-kelas').modal('hide');
            } else {
                $('input').prop('disabled', false);
                $('button').prop('disabled', false);
                $.toast({
                    heading: 'Kelas Gagal',
                    text: 'Gagal Menambah kelas baru, Silahkan coba lagi',
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
        text: "Semua data yang berkaitan dengan kelas tersebut akan terhapus juga!",   
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
                    "id_kelas" : data
                },
                dataType: "json",
                success: function (response) {
                    if(response.success=="1"){
                        swal("Berhasil!", "kelas telah terhapus.", "success");   
                    }else{
                        swal("Gagal!", "Penghapusan kelas gagal di lakukan.", "error");   
                    }
                }
            });     
            
        } 
    });
}