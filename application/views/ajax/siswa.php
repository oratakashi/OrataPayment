<?php
    echo "
    <script>
        var get_url = '".base_url('siswa/read')."';
        var detail_url = '".base_url('siswa/detail')."';
        var filter_url = '".base_url('siswa/filter')."';
        var base_url = '".base_url()."';
        var create_url = '".base_url('siswa/create')."';
        var delete_url = '".base_url('siswa/delete')."';
    </script>";
?>
<script src="<?= base_url() ?>plugins/js/siswa.js"></script>