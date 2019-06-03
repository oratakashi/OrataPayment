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
				<h3 class="box-title m-b-0">Konfigurasi Sekolah</h3>
				<p class="text-muted m-b-30">Konfigurasi untuk mengatur informasi mengenai sekolah</p>
				<div class="sttabs tabs-style-line">
                    <nav>
                        <ul>
                            <li><a href="#section-linemove-1" class="sticon ti-info"><span>Informasi Sekolah</span></a></li>
                            <li><a href="#section-linemove-2" class="sticon ti-gallery"><span>Logo Sekolah</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="section-linemove-1" >
                            <form action="<?= base_url('sekolah/simpan/info') ?>" method="post" class="form-material">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NPSN</label>
                                            <input type="text" name="npsn" class="form-control" value="<?= $data['npsn'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Sekolah</label>
                                            <input type="text" name="nama_sekolah" class="form-control" value="<?= $data['nama_sekolah'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control" value="<?= $data['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Hp</label>
                                            <input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Telpon</label>
                                            <input type="text" name="no_telp" class="form-control" value="<?= $data['no_telp'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Simpan Perubahan" class="btn btn-primary col-md-12">
                            </form>
                        </section>
                        <section id="section-linemove-2">
                            <?php echo form_open_multipart('sekolah/simpan/logo');?>
                                <div class="form-group">
                                    <p>Klik untuk mengganti logo</p>
                                    <input type="file" name="logo" data-default-file="<?=base_url()?>plugins/images/<?= $data['logo'] ?>" id="input-file-disable-remove" class="dropify" data-show-remove="false" data-show-errors="true" data-show-loader="false" data-allowed-file-extensions="png" allowed=".png"/> 
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary col-md-12">
                                </div>
                            </form>
                        </section>
                    </div>
                    <!-- /content -->
                </div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
