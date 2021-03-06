<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav slimscrollsidebar">
		<div class="sidebar-head">
			<h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
					class="hide-menu">Navigation</span></h3>
		</div>
		<div class="user-profile">
			
		</div>
		<ul class="nav" id="side-menu">
			<li> <a href="<?= base_url('dashboard') ?>" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i> <span
				class="hide-menu">Dashboard</span></a> </li>
			<li><a href="inbox.html" class="waves-effect"><i class="mdi mdi-apple-keyboard-command fa-fw"></i> <span
						class="hide-menu">Data Master<span class="fa arrow"></span></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?= base_url('siswa') ?>"><i class="ti-user fa-fw"></i><span
						class="hide-menu">Siswa</span></a></li>
					<li><a href="setkelas"><i class="ti-panel fa-fw"></i><span
						class="hide-menu">Pengaturan Kelas</span></a></li>
				</ul>
			</li>
			<li class="devider"></li>
			<li> <a href="widgets.html" class="waves-effect"><i class="ti-id-badge fa-fw"></i> <span
				class="hide-menu">Atur Biaya SPP</span></a> </li>
			<li> <a href="widgets.html" class="waves-effect"><i class="ti-id-badge fa-fw"></i> <span
					class="hide-menu">Atur Biaya Lain-lain</span></a> </li>
			<li class="devider"></li>
			<li> <a href="widgets.html" class="waves-effect"><i class="ti-shopping-cart-full fa-fw"></i> <span
					class="hide-menu">Pembayaran SPP</span></a> </li>
			<li> <a href="widgets.html" class="waves-effect"><i class="ti-shopping-cart-full fa-fw"></i> <span
					class="hide-menu">Pembayaran Lain-lain</span></a> </li>
			<li class="devider"></li>
			<li> <a href="index.html" class="waves-effect"><i class="mdi mdi-printer fa-fw"></i> <span
						class="hide-menu">Cetak Transaksi<span class="fa arrow"></span></span></a>
				<ul class="nav nav-second-level">
					<li> <a href="<?= base_url('cetak/spp') ?>"><i class=" ti-file fa-fw"></i><span class="hide-menu">Pembayaran SPP</span></a> </li>
					<li> <a href="fontawesome.html"><i class=" ti-file fa-fw"></i><span class="hide-menu">Pembayaran Lain-lain</span></a> </li>
				</ul>
			</li>
			<li class="devider"></li>
			<li><a href="<?= base_url('auth/logout') ?>" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span
						class="hide-menu">Log out</span></a></li>
		</ul>
	</div>
</div>
