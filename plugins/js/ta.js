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
        $('#layout_ta').removeClass('has-error');
        if($('#ta').val()==''){
            $('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Tahun Ajaran tidak boleh kosong. </div>`);
            $('#layout_ta').addClass('has-error');
        }else{

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
                    if(data=='1'){
                        var status = 'Sedang Aktif';
                        return `<span class="text-center label label-success label-bordered">`+status+`</span>`;
                    }else if(data=='0'){
                        var status = 'Tidak Aktif';
                        return `<span class="text-center label label-danger label-bordered">`+status+`</span>`;
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

function update_data(data){
    
    $.ajax({
        type: "post",
        url: update,
        data: {
            'id_ta' : data
        },
        dataType: "json",
        success: function (response) {
            if(response.code=='1'){
                swal("Berhasil!", "Perubahan Status aktif berhasil.", "success");  
            }else if(response.code == '0'){
                swal("Gagal!", "Perubahan Status aktif gagal di lakukan.", "error");   
            }
        }
    });
}

function tambah_data(){
    $.ajax({
        type: "post",
        url: create,
        data: {
            'ta' : $('#ta').val()
        },
        dataType: "json",
        success: function (response) {
            
        }
    });
}