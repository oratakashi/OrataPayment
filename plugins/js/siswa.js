$(document).ready(function () {
	$('#form-tambah').fadeOut();
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
	$('#o_hp').keyup(function (e) { 
		$('#validation').html('');
		$('#layout_no_hp').removeClass('has-error');
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
				data: 'jk'
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
					}

				}
			},
			{
				"data": 'nis',
				"mRender": function (data) {
					var id_operator = "'" + data + "'";
					return `
                <center>
                    <div class="btn-group m-r-10">
                        <button class="btn btn-info waves-effect waves-light">Detail Siswa</button>
						<button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"><span class="caret"></span></button>
						<ul role="menu" class="dropdown-menu animated bounceIn">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						</ul>
					</div>
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
	alert('tes');
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
		}else{
			alert('ok');

		}
	});
}
