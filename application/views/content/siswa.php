<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title"><?= $nama_sekolah ?></h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="#"><?= $nama_apps ?></a></li>
				<li><a href="#">Data Master</a></li>
				<li class="active">Siswa</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /row -->
    <div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Siswa<button class="btn btn-primary btn-outline btn-rounded" style="float:right" data-trigger="tambah_pengguna" id="btnTambah"><i class="ti-plus"></i> Tambah</button></h3>
				<p class="text-muted m-b-30">Menampilkan data Siswa</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="" id="filter_ta" class="form-control">
                                <option value="">-- Pilih Tahun Ajaran --</option>
                                <?php foreach($data_ta as $data){ ?>
                                    <option value="<?= $data['id_ta'] ?>"><?= $data['tahun_ajaran'] ?> <?php if($data['sta_aktif']=='1'){echo "[ Sedang Aktif ]";} ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" id="filter_kelas" class="form-control" disabled>
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach($data_kls as $data){ ?>
                                    <option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" id="filter_status" class="form-control" disabled>
                                <option value="">-- Pilih Status --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-danger btn-rounded col-md-12">Filter</button>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<div class="table-responsive">
					<table id="sample" class="table table-striped">
						<thead>
							<tr>
								<th>NIS</th>
								<th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
                        <tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
