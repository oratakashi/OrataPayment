$(document).ready(function () {
    $('#data-klsbaru').DataTable();
    $('#filter_ta').change(function (e) {
		e.preventDefault();
		if ($('#filter_ta').val() != '') {
			$('#filter_kelas').prop('disabled', false);
			$('#btnTambah').prop('disabled', false);
		} else {
            $('#filter_kelas').prop('disabled', true);
            $('#btnTambah').prop('disabled', true);
			$('#filter_kelas option')[0].selected = true;
			$('#filter_status').prop('disabled', true);
			$('#filter_status').html(`<option value="">-- Pilih Status --</option>`);
		}
    });
    $('#btnTambah').click(function (e) { 
        e.preventDefault();
        tampil_data_murid_baru($('#filter_ta').val(), $('#filter_kelas').val());
    });
});

function tampil_data_murid_baru(id_ta, id_kelas) { 
    var nama_kelas = "";
    $.ajax({
        type: "post",
        url: get_kelas,
        data: {
            "id_kelas" : id_kelas
        },
        dataType: "json",
        success: function (response) {
			nama_kelas = response.kelas;
			$('#data-klsbaru').DataTable().clear().destroy();
			var table = $('#data-klsbaru').DataTable({
				"ajax": {
					url: get_url,
					type: "post",
					dataSrc: 'siswa'
				},
				"columns": [{
						data: 'nis'
					},
					{
						"data": "foto",
						"mRender": function(data){
							return `
								<img class="img-circle" style="width:64px;height:64px;padding-right:-5px" src="`+base_url+`media/siswa/`+data+`" alt="user" />
							`;
						}
					},
					{
						data: 'nama_siswa'
					},
					{
						data: 'jk'
					},
					{
						"data": 'nis',
						"mRender": function (data) {
							var nis = "'" + data + "'";
							return `
						<center>
							<div class="btn-group m-r-10">
								<button class="btn btn-info waves-effect waves-light" onclick="tambah_baru('`+id_ta+`', '`+id_kelas+`', `+nis+`)">Tambah ke `+nama_kelas+`</button>
							</div>
						</center>
					  `;
						}
					}
				]
			});
        }
    });
    
    
}

function tambah_baru(id_ta, id_kelas, nis) { 
    $.ajax({
        type: "post",
        url: create_url,
        data: {
			'id_ta' : id_ta,
			'id_kelas' : id_kelas,
			'nis' : nis
		},
        dataType: "json",
        success: function (response) {
			tampil_data_murid_baru(id_ta, id_kelas);
			$.toast({
				heading: 'Siswa berhasil di tambahkan',
				text: 'Berhasil menambahkan siswa baru',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3500,
				stack: 6
			});
        }
    });
}