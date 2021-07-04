<!DOCTYPE html>
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
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/front/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/front/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/front/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/front/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url() ?>assets/front/assets/img/favicons/manifest.json">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/front/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url() ?>assets/front/assets/css/theme.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="<?= base_url() ?>assets/front/#">Sistem Pakar Kesehatan</a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-6 py-lg-8" id="tentang" data-aos="fade-up" data-aos-duration="2000">
            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot.png);background-position:right bottom;background-size:auto;margin-top:50px;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row g-xl-0 align-items-center">
                    <div class="col-md-12text-center text-md-start">
                        <h2 class="fw-bold lh-base text-center">Hasil Konsultasi </h2>
                        <hr class="text-dark mx-auto" style="height:2px;width:50px" />
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">Data Diri</h5>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td width="30%">Nama</td>
                                                <td width="2%">:</td>
                                                <td><?= $nama ?></td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Jenis Kelamin</td>
                                                <td width="2%">:</td>
                                                <td><?= $jk ?></td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Tanggal Lahir</td>
                                                <td width="2%">:</td>
                                                <td><?= $tgl_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Telepon</td>
                                                <td width="2%">:</td>
                                                <td><?= $telepon ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">Gejala yang dialami</h5>
                                        <table class="table table-borderless">
                                            <?php for ($i = 0; $i < count($gejala_dipilih); $i++) {
                                                foreach ($gejala as $g) {
                                                    if ($g->id_gejala == $gejala_dipilih[$i]) {
                                                        echo "<tr>";
                                                        echo "<td>" . $g->nama_gejala . "</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border mt-3">
                            <div class="card-body">
                                <h5 class="font-weight-bold">Penyakit yang dialami</h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <th>Nama Penyakit</th>
                                        <th>Penanganan</th>
                                        <!-- <th>Nilai</th> -->
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($konsul as $k) :
                                    ?>
                                        <tr>
                                            <td width="40%"><?= $k->nama_diagnosa ?></td>
                                            <td style="white-space: pre-wrap; word-wrap: break-word;"><?= $k->keterangan ?></td>
                                            <!-- <td><?= $k->nilai ?></td> -->
                                        </tr>
                                    <?php
                                        if ($no == 1) {
                                            break;
                                        }
                                    endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="py-3">
                            <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Learn more </button>
                        </div> -->
                        <a target="_blank" href="<?= base_url() ?>frontend/cetak/<?= $id_konsul ?>" class="btn btn-primary mt-2 float-right"><i class="fa fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-6 pt-7 bg-primary-gradient">
            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot.png);background-position:left bottom;background-size:auto;filter:contrast(1.5);">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot-2.png);background-position:right top;background-size:auto;margin-top:-75px;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row">
                    <div class="col-12 offset-lg-4 col-lg-4 order-0 order-sm-0 pe-6 text-center"><a class="text-decoration-none" href="#"><span class="fw-bold fs-1 text-light">Sistem Pakar Kesehatan</span></a>
                        <p class="mt-3 text-white">Konsultasi tentang kesehatan gratis secara online tanpa harus bertemu ahli</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section> begin ============================-->
        <section class="py-2">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <p class="mb-0">&copy; Sistem Pakar Kesehatan <?= date('Y') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url() ?>assets/front/vendors/@popperjs/popper.min.js"></script>
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