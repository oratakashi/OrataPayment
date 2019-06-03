<?php
    echo "
    <script>
        var get_url = '".base_url('siswa/read')."';
        var create_url = '".base_url('kelas/create')."';
        var delete_url = '".base_url('kelas/delete')."';
    </script>";
?>
<script src="<?= base_url() ?>plugins/js/siswa.js"></script>