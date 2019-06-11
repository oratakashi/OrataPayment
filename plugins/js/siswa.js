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
				data: 'status'
			},
			{
				"data": 'nis',
				"mRender": function (data) {
					var id_operator = "'" + data + "'";
					return `
                <center>
                    <div class="btn-group m-r-10">
                        <button class="btn btn-info waves-effect waves-light">Detail</button>
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
	}, 3000);
}

function filter(){
	alert('tes');
}
