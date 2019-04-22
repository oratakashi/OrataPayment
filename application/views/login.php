<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/plugins/images/favicon.png">
	<title><?= $judul ?></title>
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?= base_url() ?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	
	<?= "<script> var base_url = '".base_url()."'; </script>" ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<section id="wrapper" class="new-login-register">
		<div class="lg-info-panel">
			<div class="inner-panel">
				<div class="lg-content">
					<h2><a href="javascript:void(0)" class="p-10 di"><img src="<?= base_url() ?>assets/plugins/images/admin-logo.png"></a><?= $nama_apps ?></h2>
					<p class="text-muted"><?= $deskripsi ?>.</p>
					<a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Versi System : <?= $versi ?> [<?= strtoupper($code_name) ?>]</a>
				</div>
			</div>
		</div>
		<div class="new-login-box">
			<div class="white-box">
				<h3 class="box-title m-b-0">Login ke <?= $nama_apps ?></h3>
				<small>Silahkan masukan identitas anda :</small>
				<form class="form-horizontal form-material" id="loginform" method="post" action="<?=base_url('auth')?>">

					<div class="form-group  m-t-20">
						<div class="col-xs-12">
							<input class="form-control" type="email" required="" placeholder="Email" name="email">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" type="password" required="" placeholder="Kata Sandi" name="pass">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="checkbox checkbox-info pull-left p-t-0">
								<input id="checkbox-signup" type="checkbox" name="remmember">
								<label for="checkbox-signup"> Tetap Login </label>
							</div>
						</div>
					</div>
					<?php if(!empty($error)){ ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" id="btnclose" data-dismiss="alert" aria-hidden="true">&times;</button> <?= $error ?>. </div>
					<?php } ?>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
								type="submit">Log In</button>
						</div>
					</div>
				</form>
			</div>
		</div>


	</section>
	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Menu Plugin JavaScript -->
	<script src="<?= base_url() ?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

	<!--slimscroll JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
	<!--Wave Effects -->
	<script src="<?= base_url() ?>assets/js/waves.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
	<!--Style Switcher -->
	<script src="<?= base_url() ?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
