<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= base_url() ?>assets/login/https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/style.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/sweetalert2/sweetalert2.min.css" />

    <title>Halaman Login</title>
</head>

<body>


    <div class="half">
        <div class="bg order-1 order-md-2" style="background-image: url('assets/login/images/bg-4.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="form-block border-success">
                            <div class="text-center mb-5">
                                <h3 class="font-weight-bold">Login</h3>
                                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                            </div>
                            <form id="loginform" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" placeholder="your username" name="uname" id="uname" required>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password" name="pass" id="pass" required>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-success">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/main.js"></script>
    <script src="<?= base_url() ?>assets/back/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function() {
            $('#loginform').submit(function(e) {
                e.preventDefault();
                var uname = $('#uname').val();
                var pass = $('#pass').val();
                if (uname != "" && pass != "") {
                    $.ajax({
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            uname: uname,
                            pass: pass
                        },
                        url: 'auth/action_login',
                        success: function(results) {
                            if (results.condition == 2) {
                                let timerInterval
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses Login !',
                                    text: results.pesan,
                                    html: 'Mohon Tunggu ',
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        window.location.href = results.url;
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed !',
                                    text: results.pesan
                                });
                            }
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan !',
                        text: 'Field Tidak boleh kosong !'
                    })
                }
            })
        })
    </script>
</body>

</html>