<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title"><?= $nama_sekolah ?></h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="#"><?= $nama_apps ?></a></li>
				<li><a href="#">Data Master</a></li>
				<li class="active">Kelas</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<div class="sttabs tabs-style-line">
                    <nav>
                        <ul>
                            <li><a href="#section-linemove-1" class="sticon icon-login"><span>Kelas Baru</span></a></li>
                            <li><a href="#section-linemove-2" class="sticon icon-user-following"><span>Kenaikan Kelas</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="section-linemove-1" >
                            <h3 class="box-title m-b-0">Pengaturan Kelas Baru </h3>
                            <p class="text-muted m-b-30">Konfigurasi untuk menempatkan murid baru ke kelas</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select name="" id="filter_ta" class="form-control">
											<option value="">-- Pilih Tahun Ajaran --</option>
											<?php foreach($data_ta as $data){ ?>
												<option value="<?= $data['id_ta'] ?>"><?= $data['tahun_ajaran'] ?> <?php if($data['sta_aktif']=='1'){echo "[ Sedang Aktif ]";} ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="" id="filter_kelas" class="form-control" disabled>
											<option value="">-- Pilih Kelas --</option>
											<?php foreach($data_kls as $data){ ?>
												<option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<button class="btn btn-primary btn-outline btn-rounded col-md-12" id="btnTambah"><i class="ti-plus"></i> Tampilkan Data</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="white-box">
										<div class="table-responsive">
											<table id="data-klsbaru" class="table table-striped">
												<thead>
													<tr>
														<th width="15%">NIS</th>
														<th width="11%"></th>
														<th width="25%">Nama Siswa</th>
														<th width="13%">Jenis Kelamin</th>
														<th width="16%">Aksi</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                        </section>
                        <section id="section-linemove-2">
                            
                        </section>
                    </div>
                    <!-- /content -->
                </div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
