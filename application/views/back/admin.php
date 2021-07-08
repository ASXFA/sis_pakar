<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Admin</h3>
                <div class="button-right">
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnTambahAdmin">Tambah Admin</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($listAdmin)) {
                                foreach ($listAdmin as $a) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $a->username ?></td>
                                        <td>
                                            <button class='btn btn-danger btn-sm mr-2 deleteAdmin' id='<?= $a->id_admin ?>' title='Delete Admin'><i class='fa fa-trash'></i></button>
                                        </td>
                                    </tr>
                            <?php $no++;
                                endforeach;
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>Data Tidak Ada </td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel"></h5>
            </div>
            <form id="formAdmin" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Username</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <small>*password sama dengan username</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" id="operation" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" id="btnTambah" class="btn btn-info" value="">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<script>
    $(function() {
        $('#page-admin').addClass('active');

        $('#btnTambahAdmin').click(function() {
            $('#modalAdmin').modal({
                backdrop: 'static',
                show: true
            });
            $('#exampleModalLabel').html('Tambah Admin');
            $('#btnTambah').val('Tambah');
            $('#operation').val('Tambah');
            $('#username').val('');
        })

        $('#formAdmin').submit(function(e) {
            e.preventDefault();
            var username = $('#username').val();
            var operation = $('#operation').val();
            if (username != '') {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        username: username,
                    },
                    url: 'doAdmin',
                    success: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil ' + operation + ' Data !',
                            timer: 3000,
                        }).then((results) => {
                            /* Read more about handling dismissals below */
                            if (results.dismiss === Swal.DismissReason.timer) {
                                window.location.reload();
                            } else if (results.isConfirmed) {
                                window.location.reload();
                            }
                        })
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

        $(document).on('click', '.deleteAdmin', function() {
            Swal.fire({
                title: 'Yakin Di Hapus ?',
                text: 'Data akan terhapus permanen !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('id');
                    $.ajax({
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            id: id
                        },
                        url: 'deleteAdmin',
                        success: function(result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil dihapus !',
                                timer: 3000,
                            }).then((results) => {
                                /* Read more about handling dismissals below */
                                if (results.dismiss === Swal.DismissReason.timer) {
                                    window.location.reload();
                                } else if (results.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    })
                }
            })
        })
    })
</script>