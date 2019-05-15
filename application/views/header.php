<nav class="navbar navbar-default navbar-static-top m-b-0">
	<div class="navbar-header">
		<div class="top-left-part">
			<!-- Logo -->
			<a class="logo" href="index.html">
				<!-- Logo icon image, you can use font-icon also --><b>
					<!--This is dark logo icon--><img src="<?= base_url() ?>assets/plugins/images/admin-logo.png"
						alt="home" class="dark-logo" />
					<!--This is light logo icon--><img src="<?= base_url() ?>assets/plugins/images/admin-logo-dark.png"
						alt="home" class="light-logo" />
				</b>
				<!-- Logo text image you can use text also --><span class="hidden-xs">
					<p class="light-logo" style="color:black"><?= $nama_apps ?></p>
				</span> </a>
		</div>
		<!-- /Logo -->
		<!-- Search input and Toggle icon -->
		<ul class="nav navbar-top-links navbar-left">
			
		</ul>
		<ul class="nav navbar-top-links navbar-right pull-right">
			<li class="dropdown">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
						src="<?= base_url() ?>plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b
						class="hidden-xs"><?= $this->session->userdata('nama_operator');  ?></b><span class="caret"></span> </a>
				<ul class="dropdown-menu dropdown-user animated bounceIn">
					<li>
						<div class="dw-user-box">
							<div class="u-img"><img src="<?= base_url() ?>plugins/images/users/varun.jpg" alt="user" /></div>
							<div class="u-text">
								<h4 id="txtNama"><?= $this->session->userdata('nama_operator');  ?></h4>
								<p class="text-muted"><?= $this->session->userdata('email');  ?></p><p
									class="btn btn-rounded btn-danger btn-sm col-md-12"><?= $this->session->userdata('lev_user');  ?></p>
							</div>
						</div>
					</li>
					<li role="separator" class="divider"></li>
					<li><a href="#"><i class="ti-settings"></i> Pengaturan Akun</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul>
				<!-- /.dropdown-user -->
			</li>

			<!-- /.dropdown -->
		</ul>
	</div>
	<!-- /.navbar-header -->
	<!-- /.navbar-top-links -->
	<!-- /.navbar-static-side -->
</nav>
