<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Gejala</h3>
                <div class="button-right">
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnTambahGejala">Tambah Gejala</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($listGejala)) {
                                foreach ($listGejala as $g) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $g->kode_gejala ?></td>
                                        <td><?= $g->nama_gejala ?></td>
                                        <td>
                                            <button class='btn btn-warning btn-sm mr-2 editGejala' id='<?= $g->id_gejala ?>' title='Edit gejala'><i class='fa fa-edit'></i></button>
                                            <button class='btn btn-danger btn-sm mr-2 deleteGejala' id='<?= $g->id_gejala ?>' title='Delete User'><i class='fa fa-trash'></i></button>
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
<div class="modal fade" id="modalGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel"></h5>
            </div>
            <form id="formGejala" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Kode Gejala</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="kode_gejala">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Nama Gejala</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="nama_gejala">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_gejala" hidden>
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
        $('#page-gejala').addClass('active');

        $('#btnTambahGejala').click(function() {
            $('#modalGejala').modal({
                backdrop: 'static',
                show: true
            });
            $('#exampleModalLabel').html('Tambah Gejala');
            $('#btnTambah').val('Tambah');
            $('#operation').val('Tambah');
            $('#kode_gejala').val('');
            $('#nama_gejala').val('');
        })

        $('#formGejala').submit(function(e) {
            e.preventDefault();
            var id_gejala = $('#id_gejala').val();
            var kode_gejala = $('#kode_gejala').val();
            var nama_gejala = $('#nama_gejala').val();
            var operation = $('#operation').val();
            if (kode_gejala != '' && nama_gejala != '') {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id_gejala: id_gejala,
                        kode_gejala: kode_gejala,
                        nama_gejala: nama_gejala,
                        operation: operation
                    },
                    url: 'doGejala',
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

        $(document).on('click', '.editGejala', function() {
            var id = $(this).attr('id');
            $('#modalGejala').modal('show');
            $('#exampleModalLabel').html('Edit Gejala');
            $('#id_gejala').val(id);
            $('#btnTambah').val('Edit');
            $('#operation').val('Edit');
            $.ajax({
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                url: 'gejalaById',
                success: function(result) {
                    $('#kode_gejala').val(result.kode_gejala);
                    $('#nama_gejala').val(result.nama_gejala);
                }
            })
        })

        $(document).on('click', '.deleteGejala', function() {
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
                        url: 'deleteGejala',
                        success: function(result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil dihapus !',
                                timer: 3000,
                            }).then((results) => {
                                /* Read more about handling dismissals below */
                                if (results.dismiss === Swal.DismissReason.timer) {
                                    $('#table-gejala').DataTable().ajax.reload();
                                } else if (results.isConfirmed) {
                                    $('#table-gejala').DataTable().ajax.reload();
                                }
                            })
                        }
                    })
                }
            })
        })
    })
</script>