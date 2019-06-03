$(document).ready(function () {
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
});
