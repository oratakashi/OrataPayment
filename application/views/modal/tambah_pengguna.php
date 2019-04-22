<div id="tambah-pengguna" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Pengguna Baru</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-material">
				<div class="form-group" id="validation"></div>
					<div class="form-group" id="layout_id">
						<label for="">ID. Pengguna</label>
						<input type="text" name="" id="id_operator" disabled class="form-control">
					</div>
					<div class="form-group" id="layout_nama">
						<label for="">Nama Pengguna</label>
						<input type="text" name="" id="nama_operator" class="form-control">
					</div>
					<div class="form-group" id="layout_email">
						<label for="">Email Pengguna</label>
						<input type="text" name="" id="email" class="form-control">
					</div>
					<div class="form-group" id="layout_levuser">
						<label for="">Level User</label>
						<select name="" id="lev_user" class="form-control select2-drop-mask">
							<option value="">-- Pilih Level User --</option>
							<option value="Kepala Sekolah">Kepala Sekolah</option>
							<option value="Operator">Operator</option>
						</select>
					</div>
					<p>Keterangan : Untuk pengguna baru kata sandi otomatis tergenerate sesuai ID. Pengguna</p>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-outline waves-effect" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-danger btn-outline waves-effect" id="btnSimpan">Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
