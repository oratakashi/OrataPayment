<?php
    echo "
    <script>
        var get_url = '".base_url('pengguna/read')."';
        var get_id = '".base_url('pengguna/getid')."';
        var create_url = '".base_url('pengguna/create')."';
        var delete_url = '".base_url('pengguna/delete')."';
        var read_data = '".base_url('pengguna/read_data')."';
        var update = '".base_url('pengguna/update')."';
    </script>";
?>
<script src="<?= base_url() ?>plugins/js/pengguna.js"></script>