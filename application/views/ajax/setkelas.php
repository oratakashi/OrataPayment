<?php
    echo "
    <script>
        var get_url = '".base_url('setkelas/read')."';
        var get_kelas = '".base_url('kelas/read_kelas')."';
        var base_url = '".base_url()."';
        var create_url = '".base_url('setkelas/create')."';
        var delete_url = '".base_url('kelas/delete')."';
    </script>";
?>
<script src="<?= base_url() ?>plugins/js/setkelas.js"></script>