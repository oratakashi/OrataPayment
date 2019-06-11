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
                            <h3 class="box-title m-b-0">Konfigurasi Sekolah <button class="btn btn-primary btn-outline btn-rounded" style="float:right" data-trigger="tambah_pengguna" id="btnTambah"><i class="ti-plus"></i> Masukan Murid</button></h3>
                            <p class="text-muted m-b-30">Konfigurasi untuk mengatur informasi mengenai sekolah</p>
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
