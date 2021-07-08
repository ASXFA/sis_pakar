<div class="content-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Ganti Username</h4>
                    </div>
                    <div class="box-body">
                        <form id="formUsername" method="post">
                            <div class="form-group">
                                <label for="" class="form-control-label">Username</label>
                                <input type="text" id="username" class="form-control" value="<?= $user->username ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-sm" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Ganti Username</h4>
                    </div>
                    <div class="box-body">
                        <form id="formEditPassword" method="post">
                            <div class="form-group">
                                <label for="password_lama" class="form-control-label">Password Lama</label>
                                <input type="password" id="pass_lama" class="form-control border border-secondary" required>
                            </div>
                            <div class="form-group">
                                <label for="password_baru" class="form-control-label">Password Baru</label>
                                <input type="password" id="pass_baru" class="form-control border border-secondary" required>
                            </div>
                            <div class="form-group" id="form-pass">
                                <label for="konfirmasi_password" class="form-control-label" style="color:black !important">Konfirmasi Password</label>
                                <input type="password" id="conf_pass" class="form-control has-success" required>
                                <small id="smal" class="text-danger">Password tidak sama !</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-sm float-right" id="savePassword" disabled><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#page-pengaturan').addClass('active');
        $('#smal').hide();
        $('#conf_pass').keyup(function() {
            var baru = $('#pass_baru').val();
            var conf = $('#conf_pass').val();
            if (baru != conf) {
                $('#form-pass').removeClass('has-success');
                $('#form-pass').addClass('has-error');
                $('#savePassword').attr('disabled', 'disabled');
                $('#smal').show();
            } else {
                $('#form-pass').removeClass('has-error');
                $('#form-pass').addClass('has-success');
                $('#savePassword').removeAttr('disabled');
                $('#smal').hide();
            }
        })

        $('#formUsername').submit(function(e) {
            e.preventDefault();
            var username = $('#username').val();
            if (username != '') {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        username: username
                    },
                    url: 'editUsername',
                    success: function(result) {
                        if (result.cond == '1') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil diganti !',
                                timer: 3000,
                            }).then((results) => {
                                if (results.dismiss === Swal.DismissReason.timer) {
                                    window.location.reload();
                                } else if (results.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal !',
                                text: 'Gagal Mengganti Username !'
                            })
                        }
                    }
                })
            } else {
                Swal.fire({
                    icon: 'Warning',
                    title: 'Peringatan !',
                    text: 'Field Tidak boleh kosong !'
                })
            }
        })

        $('#formEditPassword').submit(function(e) {
            e.preventDefault();
            var pass_lama = $('#pass_lama').val();
            var pass_baru = $('#pass_baru').val();
            var conf_pass = $('#conf_pass').val();

            if (pass_lama != "" && pass_baru != "" && conf_pass != "") {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        pass_lama: pass_lama,
                        pass_baru: pass_baru
                    },
                    url: 'editPassword',
                    success: function(result) {
                        if (result.cond == 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Peringatan !',
                                text: 'Password Lama Anda Salah !'
                            })
                        } else if (result.cond == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil diganti !',
                                timer: 3000,
                            }).then((results) => {
                                if (results.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = '../auth/logout';
                                } else if (results.isConfirmed) {
                                    window.location.href = '../auth/logout';
                                }
                            });
                        }
                    }
                })
            } else {
                Swal.fire({
                    icon: 'Warning',
                    title: 'Peringatan !',
                    text: 'Field Tidak boleh kosong !'
                })
            }
        })
    })
</script>