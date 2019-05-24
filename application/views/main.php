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
    <link href="<?= base_url() ?>assets/plugins/bower_components/datatables/dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url() ?>assets/css/colors/default.css" id="theme" rel="stylesheet">
    <script src="<?= base_url() ?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/datatables/dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <!-- Custom -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bower_components/dropify/dist/css/dropify.min.css">

    <!-- SweetAlert -->
    <link href="<?= base_url() ?>assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <!-- End -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('header'); ?>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
            if($this->session->userdata('lev_user') == 'Kepala Sekolah'){
                $this->load->view('sidebar/kepsek.php');                
            }
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <?php
                if($content == 'dashboard'){
                    $this->load->view('content/dashboard_kepsek.php'); 
                }elseif($content == 'pengguna'){
                    $this->load->view('content/pengguna.php');
                    $this->load->view('ajax/pengguna.php');
                    $this->load->view('modal/tambah_pengguna.php');
                    $this->load->view('modal/ubah_pengguna.php');
                }elseif($content == 'ta'){
                    $this->load->view('content/ta.php');
                    $this->load->view('ajax/ta.php');
                    $this->load->view('modal/tambah_ta.php');
                }elseif($content == 'kelas'){
                    $this->load->view('content/kelas.php');
                    $this->load->view('ajax/kelas.php');
                    $this->load->view('modal/tambah_kelas.php');
                }elseif($content == 'sekolah'){
                    $this->load->view('content/sekolah.php');
                    $this->load->view('ajax/kelas.php');
                    $this->load->view('modal/tambah_kelas.php');
                }
            ?>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?= date('Y') ?> &copy; <?= $nama_apps ?> Versi <?= $versi ?> [<?= strtoupper($code_name) ?>] </footer>
        </div>


        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?= base_url() ?>assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    
    <!-- chartist chart -->
    <script src="<?= base_url() ?>assets/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?= base_url() ?>assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url() ?>assets/js/dashboard1.js"></script>

    <script src="<?= base_url() ?>assets/js/cbpFWTabs.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script type="text/javascript">
        (function () {
                var array = new Array();
                [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
                    new CBPFWTabs(el);
                });
        })();
        
    </script>
    
    
    <!--Style Switcher -->
    <script src="<?= base_url() ?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script>
        $('#sample').DataTable();
        $('.dropify').dropify({
            messages: {
                'default': 'Klik atau seret gambar untuk mengganti logo',
                'replace': 'Klik atau seret gambar untuk mengganti logo',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            },
            error: {
                'fileSize': 'The file size is too big ({{ value }} max).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'The image format is not allowed ({{ value }} only).'
            }
        });
    </script>
</body>

</html>