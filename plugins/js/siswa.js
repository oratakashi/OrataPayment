$(document).ready(function () {
	$('#form-tambah').fadeOut();
	$('#form-detail').fadeOut();
	get_data();
	$('#filter_ta').change(function (e) {
		e.preventDefault();
		if ($('#filter_ta').val() != '') {
			$('#filter_kelas').prop('disabled', false);
		} else {
			$('#filter_kelas').prop('disabled', true);
			$('#filter_kelas option')[0].selected = true;
			$('#filter_status').prop('disabled', true);
			$('#filter_status').html(`<option value="">-- Pilih Status --</option>`);
		}
	});
	$('#filter_kelas').change(function (e) {
		e.preventDefault();
		if ($('#filter_kelas').val() == 'KLS00') {
			$('#filter_status').prop('disabled', false);
			$('#filter_status').html(`<option value="">-- Pilih Status --</option>`);
			$('#filter_status').append(`<option value="Lulus">Lulus</option>`);
		} else if ($('#filter_kelas').val() == '') {
			$('#filter_status').prop('disabled', true);
			$('#filter_status').html(`<option value="">-- Pilih Status --</option>`);
		} else {
			$('#filter_status').prop('disabled', false);
			$('#filter_status').html(`<option value="">-- Pilih Status --</option>`);
			$('#filter_status').append(`<option value="Aktif">Aktif</option>`);
			$('#filter_status').append(`<option value="Tidak Aktif">Tidak Aktif</option>`);
			$('#filter_status').append(`<option value="Mengundurkan Diri">Mengundurkan Diri</option>`);
			$('#filter_status').append(`<option value="Dikeluarkan">Dikeluarkan</option>`);
			$('#filter_status').append(`<option value="Meninggal">Meninggal</option>`);
		}
	});
	$('#btnTambah').click(function (e) {
		e.preventDefault();
		$('#content').fadeOut();
		$('#form-tambah').fadeIn();
	});
	$('#btnCancel').click(function (e) {
		e.preventDefault();
		$('#form-tambah').fadeOut();
		$('#content').fadeIn();
	});
	$('#btnClose').click(function (e) {
		e.preventDefault();
		$('#form-detail').fadeOut();
		$('#content').fadeIn();
	});
	$('#btnFilter').click(function (e) { 
		e.preventDefault();
		filter();
	});
	$('#nis').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_nis').removeClass('has-error');
	});
	$('#nama_lengkap').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_nama').removeClass('has-error');
	});
	$('#tmp_lahir').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_tgl').removeClass('has-error');
	});
	$('#tgl_lahir').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_tgl').removeClass('has-error');
	});
	$('#nama_ayah').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_nama_ayah').removeClass('has-error');
	});
	$('#nama_ibu').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_nama_ibu').removeClass('has-error');
	});
	$('#no_hp').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_no_hp').removeClass('has-error');
	});
	$('#email').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_email').removeClass('has-error');
	});
	$('#alamat').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_alamat').removeClass('has-error');
	});
	$('#jk').change(function (e) { 
		if($('#jk').val() == ''){
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Jenis Kelamin tidak boleh kosong. </div>`);
            $('#layout_jk').addClass('has-error');
		}else{
			$('#validation').html('');
			$('#layout_jk').removeClass('has-error');
		}
	});
	validasi_form();
});

function get_data() {
	var table = $('#data-siswa').DataTable({
		"ajax": {
			url: get_url,
			type: "get",
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
				"data": 'status',
				"mRender": function (data) {
					if (data == 'Aktif') {
						var status = 'Aktif';
						return `<span class="text-center label label-success label-bordered">` + status + `</span>`;
					} else if (data == 'Tidak Aktif') {
						var status = 'Tidak Aktif';
						return `<span class="text-center label label-danger label-bordered">` + status + `</span>`;
					} else{
						return `<span class="text-center label label-warning label-bordered">` + data + `</span>`;
					}

				}
			},
			{
				"data": 'nis',
				"mRender": function (data) {
					var nis = "'" + data + "'";
					return `
                <center>
				<button type="button" class="btn btn-success btn-rounded" onclick="detail_siswa(`+nis+`)"><i class="fa fa-info-circle"></i>  Detail Murid</button>
				<button type="button" class="btn btn-primary btn-outline btn-rounded" onclick=""><i class="fa fa-pencil"></i> </button>
				<button type="button" class="btn btn-danger btn-outline btn-rounded" onclick=""><i class="fa fa-trash"></i> </button>
				</center>
			  `;
				}
			}
		]
	});
	setInterval(() => {
		table.ajax.reload(null, false);
	}, 10000);
}

function filter(){
	
}

function validasi_form() { 
	$('#form_tambah').submit(function (e) { 
		if($('#nis').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> NIS tidak boleh kosong. </div>`);
            $('#layout_nis').addClass('has-error');
		}else if($('#nama_lengkap').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Nama tidak boleh kosong. </div>`);
            $('#layout_nama').addClass('has-error');
		}else if($('#tmp_lahir').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Tempat Lahir tidak boleh kosong. </div>`);
            $('#layout_tgl').addClass('has-error');
		}else if($('#tgl_lahir').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Tanggal Lahir tidak boleh kosong. </div>`);
            $('#layout_tgl').addClass('has-error');
		}else if($('#jk').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Jenis Kelamin tidak boleh kosong. </div>`);
            $('#layout_jk').addClass('has-error');
		}else if($('#nama_ayah').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Nama Ayah tidak boleh kosong. </div>`);
            $('#layout_nama_ayah').addClass('has-error');
		}else if($('#nama_ibu').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Nama Ibu tidak boleh kosong. </div>`);
            $('#layout_nama_ibu').addClass('has-error');
		}else if($('#no_hp').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> No Hp tidak boleh kosong. </div>`);
            $('#layout_no_hp').addClass('has-error');
		}else if($('#email').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Email tidak boleh kosong. </div>`);
            $('#layout_email').addClass('has-error');
		}else if($('#alamat').val() == ''){
			e.preventDefault();
			$('#validation').html(`<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Alamat tidak boleh kosong. </div>`);
            $('#layout_alamat').addClass('has-error');
		}
	});
}

function detail_siswa(nis) {
	$('#detail_kelas').html("Belum ada kelas");
	$('#detail_riwayat').html("");
	$.ajax({
		type: "get",
		url: detail_url+"/"+nis,
		dataType: "json",
		success: function (response) {
			$('#detail_nis').html("NIS : "+response.data_siswa.nis);
			$('#detail_nama').html(response.data_siswa.nama_siswa);
			$('#detail_jk').html(response.data_siswa.jk);
			$('#detail_ttl').html(response.data_siswa.tmp_lahir+", "+response.data_siswa.tgl_lahir);
			$('#detail_ayah').html(response.data_siswa.nama_ayah);
			$('#detail_ibu').html(response.data_siswa.nama_ibu);
			$('#detail_email').html(response.data_siswa.email);
			$('#detail_alamat').html(response.data_siswa.alamat);
			$('#detail_kelas').html(response.kelas_aktif.kelas);
			if(response.data_kelas.cek == 'not_null'){
				$.each(response.data_kelas.isi_data, function (index, value) { 
					 $('#detail_riwayat').append(`
						 <tr>
							 <td>`+(index+1)+`</td>
							 <td>`+value.tahun_ajaran+`</td>
							 <td>`+value.kelas+`</td>
						 <td>
					 `);
				});
			}else{
				$('#detail_riwayat').append(`
					<tr>
						<td col-span='3' class='text-center'>Siswa belum masuk ke dalam kelas</td>
					<td>
				`);
			}
			$('#content').fadeOut();
			$('#form-detail').fadeIn();
		}
	});
}
