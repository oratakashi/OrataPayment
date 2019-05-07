$(document).ready(function () {
    get_data();
    $('#btnTambah').click(function (e) { 
        e.preventDefault();
        $('#validation').html('');
        $.ajax({
            type: "get",
            url: get_id,
            dataType: "json",
            success: function (response) {
                $('#id_operator').val(response.id_operator);
            }
        });
        $('#tambah-pengguna').modal({
            keyboard: false,
            show: true
        });
    });
    $('#btnSimpan').click(function (e) { 
        e.preventDefault();
        $('#layout_nama').removeClass('has-error');
        $('#layout_email').removeClass('has-error');
        $('#layout_levuser').removeClass('has-error');
        if($('#nama_operator').val()==''){
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Nama Pengguna tidak boleh kosong. </div>`);
            $('#layout_nama').addClass('has-error');
        }else if($('#email').val()==''){
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Email Pengguna tidak boleh kosong. </div>`);
            $('#layout_email').addClass('has-error');
        }else if($('#lev_user').val()==''){
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Level User tidak boleh kosong. </div>`);
            $('#layout_levuser').addClass('has-error');
        }else if($('#id_operator').val()=='Data Penuh!'){
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Anda sudah mencapai jumlah maksimal untuk hari ini, Coba lagi besok. </div>`);
            $('#layout_id').addClass('has-error');
        }else{
            tambah_data();
        }
    });
    $('#nama_operator').keyup(function (e) { 
        $('#validation').html('');
        $('#layout_nama').removeClass('has-error');
    });
    $('#email').keyup(function (e) { 
        $('#validation').html('');
        $('#layout_email').removeClass('has-error');
    });
    $('#lev_user').change(function (e) { 
        e.preventDefault();
        $('#validation').html('');
        $('#layout_levuser').removeClass('has-error');
    });
    for(var i=0; i<=100; i++){
        
        $('#loading').html(i+'%');
        $('#loading').css('width', i+'%');
    }
    $('#loading_bg').delay(500).slideUp();
});

function get_data(){
    var table = $('#data-pengguna').DataTable({
            "ajax": {
                url: get_url,
                type: "get",
                dataSrc: 'pengguna'
            },
            "columns": [{
                data: 'id_operator'
            },
            {
                data: 'nama_operator'
            },
            {
                data: 'lev_user'
            },
            {
                data: 'email'
            },
            {
                "data": 'id_operator',
                "mRender": function (data) {
                    var id_operator = "'" + data + "'";
                    return `
                        <center>
                            <button type="button" class="btn btn-primary btn-outline btn-circle" onclick="modal_update(`+id_operator+`)"><i class="fa fa-pencil"></i> </button>
                            <button type="button" class="btn btn-danger btn-outline btn-circle" onclick="delete_data(`+id_operator+`)"><i class="fa fa-trash"></i> </button>
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

function tambah_data(){
    $.ajax({
        type: "post",
        url: create_url,
        data: {
            'id_operator' : $('#id_operator').val(),
            'nama_operator' : $('#nama_operator').val(),
            'email' : $('#email').val(),
            'lev_user' : $('#lev_user').val()
        },
        dataType: "json",
        success: function (response) {
            if(response.success == '1'){
                $.toast({
                    heading: 'Tambah Pengguna Berhasil',
                    text: 'Berhasil menambah pengguna baru, kata sandi pengguna baru sesuai dengan id pengguna masing-masing',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500, 
                    stack: 6
                  });
            }else{
                $.toast({
                    heading: 'Tambah Pengguna Gagal',
                    text: 'Gagal Menambah Pengguna baru, Silahkan coba lagi',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                    
                  });
            }
            $('#id_operator').val('');
            $('#nama_operator').val('');
            $('#email').val('');
            $('#lev_user')[0].selected = true;
            $('#tambah-pengguna').modal('hide');
        }
    });
}

function delete_data(data) { 
    swal({   
        title: "Apa anda yakin?",   
        text: "Pengguna yang sudah dihapus tidak bisa mengakses aplikasi kembali!",   
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
                    "id_operator" : data
                },
                dataType: "json",
                success: function (response) {
                    if(response.success=="1"){
                        swal("Berhasil!", "Pengguna ID."+data+" telah terhapus.", "success");   
                    }else{
                        swal("Gagal!", "Penghapusan pengguna gagal di lakukan.", "error");   
                    }
                }
            });     
            
        } 
    });
}

function modal_update(data){
    
    $('#ubah-pengguna').modal({
        keyboard: false,
        show: true
    });
}