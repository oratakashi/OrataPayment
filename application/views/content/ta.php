<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title"><?= $nama_sekolah ?></h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="#"><?= $nama_apps ?></a></li>
				<li><a href="#">Data Master</a></li>
				<li class="active">Tahun Ajaran</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Tahun Ajaran<button class="btn btn-primary btn-outline btn-rounded" style="float:right" data-trigger="tambah_pengguna" id="btnTambah"><i class="ti-plus"></i> Tambah</button></h3>
				<p class="text-muted m-b-30">Menampilkan data Tahun Ajaran</p>
				<div class="table-responsive">
					<table id="data-ta" class="table table-striped">
						<thead>
							<tr>
								<th>Tahun Ajaran</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
                        <tbody></tbody>
                        <tfoot>
                            <p>Keterangan : Tekan Ubah Status untuk mengaktifkan atau menonaktifkan tahun ajaran</p>
                        </tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
