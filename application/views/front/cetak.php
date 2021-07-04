<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Aplikasi Sistem Pakar</title>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url() ?>assets/front/assets/css/theme.css" rel="stylesheet" />
    <style>
        .table1 {
            width: 100%;
            height: 100%;
            font-family: sans-serif;
            color: black;
            border: 1px solid black;
            border-spacing: 0px;
            margin-bottom: 5px;
        }

        .table1 tr {
            border: 1px solid !important;
        }

        .table1 th,
        .table1 td {
            border: 1px solid black !important;
            padding: 3px 5px;
        }
    </style>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <div class="container">
        <div class="row">
            <h2 style="font-size: 22px; font-weight: bold;" class="text-center">HASIL KONSULTASI</h2>
            <br>
            <div class="card">
                <div class="card-body">
                    <h2 style="font-size: 16px; font-weight:700">Informasi data diri yang telah anda masukkan</h2>
                    <table class="table table-borderless" style="color:black; font-size:14px;">
                        <tr>
                            <td style="padding: 5px 0px;" width="15%"><b>Nama</b></td>
                            <td style="padding: 5px 0px;" width="2%">:</td>
                            <td style="padding: 5px 0px;"><?= $konsul->nama ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0px;" width="15%">Jenis Kelamin</td>
                            <td style="padding: 5px 0px;" width="2%">:</td>
                            <td style="padding: 5px 0px;"><?= $konsul->jk ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0px;" width="15%">Tanggal Lahir</td>
                            <td style="padding: 5px 0px;" width="2%">:</td>
                            <td style="padding: 5px 0px;"><?= date('d F Y', strtotime($konsul->nama)) ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0px;" width="15%">Telepon</td>
                            <td style="padding: 5px 0px;" width="2%">:</td>
                            <td style="padding: 5px 0px;"><?= $konsul->telepon ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 style="font-size: 16px; font-weight:700"><b>Gejala yang dipilih</b></h2>
                    <table class="table1" style="color:black; font-size:12px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gejala</th>
                            </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($temp as $t) : ?>
                            <tr>
                                <td style="padding: 5px;" width="5%"><?= $no ?></td>
                                <td style="padding: 5px;"><?= $t->nama_gejala ?></td>
                            </tr>
                        <?php $no++;
                        endforeach ?>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-borderles">
                        <?php
                        $no = 1;
                        foreach ($detail as $d) {
                        ?>
                            <tr>
                                <td style="font-weight:700; color:black; padding: 5px 0px;" width="20%">Hasil Diagnosa </td>
                                <td width="3%"> : </td>
                                <td style="padding: 5px 0px; color:black;"><?= $d->nama_diagnosa ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:700; color:black; padding: 5px 0px;" width="20%">Penanganan </td>
                                <td width="3%"> : </td>
                                <td style="padding: 5px 0px; color:black; white-space: pre-wrap; word-wrap: break-word;"><?= $d->keterangan ?></td>
                            </tr>
                        <?php
                            if ($no == 1) {
                                break;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src=" <?= base_url() ?>assets/front/vendors/@popperjs/popper.min.js">
    </script>
    <script src="<?= base_url() ?>assets/front/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?= base_url() ?>assets/front/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&amp;display=swap" rel="stylesheet">
    <script src="<?= base_url() ?>assets/back/js/jQuery-2.1.4.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(function() {
            AOS.init();
        })
    </script>
</body>

</html>