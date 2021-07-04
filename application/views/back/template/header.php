<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Sistem Pakar Metode CF Net Belief</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/css/bootstrap.min.css">
    <!-- Datatables CSS for Bootstrap -->
    <link href="<?= base_url() ?>assets/back/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/css/font-awesome.min.css">
    <!-- Bootstrap Select -->
    <link href="<?= base_url() ?>assets/back/bootstrap-select/bootstrap-select.css" rel="stylesheet">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/iCheck/flat/_all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/css/skins/skin-green.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/sweetalert2/sweetalert2.min.css" />
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>favico/backn.ico" type="image/x-icon" /> -->
    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url() ?>assets/back/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url() ?>assets/back/js/bootstrap.min.js"></script>
    <!-- Datatables Javascript for Bootstrap -->
    <script src="<?= base_url() ?>assets/back/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/back/datatables/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap Select JS -->
    <script src="<?= base_url() ?>assets/back/bootstrap-select/bootstrap-select.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?= base_url() ?>assets/back/iCheck/icheck.min.js"></script>
    <!-- printThis -->
    <script src="<?= base_url() ?>assets/back/js/printThis.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/back/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/back/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#dataTables1').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "responsive": true,
                "bLengthChange": true,
                "bInfo": true,
                "oLanguage": {
                    "sSearch": "Cari: "
                }
            });

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            // $('#confirm-delete').on('show.bs.modal', function(e) {
            //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            // });
        });
    </script>
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->