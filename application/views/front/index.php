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
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#petunjuk">Petunjuk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary btn-sm text-white" href="javascript:void(0)" id="btn-atas-konsultasi">Mulai Konsultasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-0" data-aos="fade" id="home" data-aos-duration="2000">
            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot.png);background-position:left;background-size:auto;margin-top:-105px;">
            </div>
            <!--/.bg-holder-->

            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-6 order-md-1 pt-8"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/hero-header.png" alt="" /></div>
                    <div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
                        <h1 class="mb-4 display-3 fw-bold">Sistem Pakar Kesehatan<br class="d-block d-lg-none d-xl-block" />Untuk Anda.</h1>
                        <p class="mt-3 mb-4 fs-1">Kami akan melakukan pemeriksaan secara digital.<br class="d-none d-lg-block" />anda hanya harus menjawab pertanyaan yang kami ajukan <br class="d-none d-lg-block" />dengan baik dan benar</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="javascript:void(0)" role="button" id="btn-tengah-konsultasi">Mulai Konsultasi</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-8" id="petunjuk" data-aos="fade" data-aos-duration="3000">
            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/services-bg.png);background-position:center left;background-size:auto;">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot-2.png);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
            </div>
            <!--/.bg-holder-->

            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-3 text-center">
                        <h2 class="fw-bold">Petunjuk Konsultasi</h2>
                        <hr class="w-25 mx-auto text-dark" style="height:2px;" />
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-9 col-xl-8 text-center">
                        <p>Berikut adalah tahapan-tahapan melakukan konsultasi online di aplikasi sistem pakar kesehatan </p>
                    </div>
                </div>
                <div class="row justify-content-center h-100 pt-7 g-4">
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3 mb-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/button.png" width="64%" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Klik Tombol Mulai Konsultasi</h4>
                                    <p class="card-text">Klik Tombol Mulai Konsultasi untuk memulai proses konsultasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/details-info.png" height="90" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Isi Data Diri</h4>
                                    <p class="card-text">Isikan data diri anda berupa nama, tanggal lahir dan no telepon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/consultation.png" height="90" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Konsultasi Online</h4>
                                    <p class="card-text">Anda langsung melakukan konsultasi secara online dengan menjawab pertanyaan perihal gejala yang sedang anda alami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/proses.png" height="90" width="30%" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Proses Data</h4>
                                    <p class="card-text">Setelah anda mengisi form konsultasi, sistem akan memproses data yang telah anda isi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/tracking.png" height="90" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Hasil</h4>
                                    <p class="card-text">Sistem akan memberikan hasil diagnosa perihal konsultasi yang telah anda lakukan. dan anda bisa mencetaknya sebagai file PDF </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                            <div class="card-body text-center text-md-start">
                                <div class="py-3"><img class="img-fluid" src="<?= base_url() ?>assets/front/assets/img/illustrations/selesai.png" height="90" width="40%" alt="" /></div>
                                <div class="py-3">
                                    <h4 class="fw-bold card-title">Selesai</h4>
                                    <p class="card-text">Tahapan konsultasi selesai. Terimakasih telah menggunakan aplikasi sistem pakar kesehatan. Semoga bermanfaat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-6 py-lg-8" id="tentang" data-aos="fade-up" data-aos-duration="2000">
            <div class="bg-holder" style="background-image:url(assets/front/assets/img/illustrations/dot.png);background-position:right bottom;background-size:auto;margin-top:50px;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row g-xl-0 align-items-center">
                    <div class="col-md-6"><img class="img-fluid mb-5 mb-md-0" src="<?= base_url() ?>assets/front/assets/img/illustrations/about-1.png" width="480" alt="" /></div>
                    <div class="col-md-6 text-center text-md-start">
                        <h2 class="fw-bold lh-base">Tentang Sistem Pakar Kesehatan </h2>
                        <hr class="text-dark mx-auto mx-md-0" style="height:2px;width:50px" />
                        <p class="pt-3">Aplikasi sistem pakar kesehatan ini bertujuan untuk mempermudah pasien untuk berkonsultasi tanpa harus bertemu dengan ahli. Sehingga pasien dapat mengetahui penyakit yang dialami dari gejala-gejala yang timbul saat ini. </p>
                        <!-- <div class="py-3">
                            <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Learn more </button>
                        </div> -->
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="<?= base_url('frontend/konsul') ?>" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="mb-3"><u>Form Data Diri</u>
                                        </h4>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-control-label">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control" required>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-control-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control " required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-control-label">No Telepon</label>
                                                <input type="text" maxlength="12" name="telepon" id="telepon" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="mb-3"><u>Form Konsultasi</u></h4>
                                        <h5 class="font-weight-normal mb-3">
                                            Pilih gejala-gejala yang anda alami dibawah ini. Bisa lebih dari 1
                                        </h5>
                                        <?php foreach ($gejala as $g) : ?>
                                            <div class="col-md-3">
                                                <div class="form-check" style="font-size:18px !important;">
                                                    <input class="form-check-input" type="checkbox" name="form_gejala[]" value="<?= $g->id_gejala ?>">
                                                    <label class="form-check-label font-weight-bold">
                                                        <?= $g->nama_gejala ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer bg-primary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-light">Selesai</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- endmodal -->

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
            $('#btn-atas-konsultasi').click(function() {
                $('#exampleModal').modal('show');
            })
            $('#btn-tengah-konsultasi').click(function() {
                $('#exampleModal').modal('show');
            })
        })
    </script>
</body>

</html>