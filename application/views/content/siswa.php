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
	<div id="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Siswa<button class="btn btn-primary btn-outline btn-rounded" style="float:right" id="btnTambah"><i class="ti-plus"></i> Tambah</button></h3>
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
						<table id="data-siswa" class="table table-striped">
							<thead>
								<tr>
									<th width="15%">NIS</th>
									<th width="11%"></th>
									<th width="25%">Nama Siswa</th>
									<th width="13%">Jenis Kelamin</th>
									<th width="16%">Status</th>
									<th width="16%">Aksi</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="form-tambah">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Tambah Siswa Baru<button class="btn btn-danger btn-outline btn-rounded" style="float:right" id="btnCancel"><i class="ti-close"></i> Batal</button></h3>
					<p class="text-muted m-b-30">Silahkan isi form berikut ini :</p>
					<div class="row">
						<?php echo form_open_multipart('siswa/create', array('class'=>'form-material'));?>
							<div class="col-md-3">
								<input type="file" name="logo" data-default-file="<?=base_url()?>plugins/images/no-pict.png" id="input-file-disable-remove" class="dropify" data-show-remove="false" data-show-errors="true" data-show-loader="false" data-allowed-file-extensions="png" allowed=".png"/> 
								<p for="">Tekan atau seret untuk menambahkan foto</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<h4 class="box-title m-b-0">Informasi Pribadi</h4>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Nama Lengkap</label>
											<input type="text" name="nama_lengkap" id="" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Tempat & Tgl Lahir</label>
											<div class="row">
												<div class="col-md-8">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control" id="datepicker-autoclose">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="">Jenis Kelamin</label>
											<select name="" id="" class="form-control">
												<option value="">-- Pilih Jenis Kelamin --</option>
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Nama Ayah</label>
											<input type="text" name="nama_ayah" id="" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Nama Ibu</label>
											<input type="text" name="nama_ibu" id="" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
