<?php
    echo "
    <script>
        var get_url = '".base_url('pengguna/read')."';
        var get_id = '".base_url('pengguna/getid')."';
        var create_url = '".base_url('pengguna/create')."';
    </script>";
?>
<script src="<?= base_url() ?>plugins/js/pengguna.js"></script>