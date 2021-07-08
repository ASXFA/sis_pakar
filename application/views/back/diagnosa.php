<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Diganosa</h3>
                <div class="button-right">
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnTambahDiagnosa">Tambah Diagnosa</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Diagnosa</th>
                                <th>Nama Diganosa</th>
                                <th width="30%">Keterangan</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($listDiagnosa)) {
                                foreach ($listDiagnosa as $d) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d->kode_diagnosa ?></td>
                                        <td><?= $d->nama_diagnosa ?></td>
                                        <td class="text-justify " style="white-space: pre-wrap; word-wrap: break-word;"><?= $d->keterangan ?></td>
                                        <td>
                                            <button class='btn btn-warning btn-sm mr-2 editDiagnosa' id='<?= $d->id_diagnosa ?>' title='Edit diagnosa'><i class='fa fa-edit'></i></button>
                                            <button class='btn btn-danger btn-sm mr-2 deleteDiagnosa' id='<?= $d->id_diagnosa ?>' title='Delete Diagnosa'><i class='fa fa-trash'></i></button>
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
<div class="modal fade" id="modalDiagnosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel"></h5>
            </div>
            <form id="formDiagnosa" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Kode Diganosa</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="kode_diagnosa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Nama Diagnosa</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="nama_diagnosa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Keterangan</label>
                        <div class="col-lg-12">
                            <textarea name="keterangan_diagnosa" id="keterangan" cols="3" rows="5" class="form-control"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="text" id="id_diagnosa" hidden>
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
        $('#page-diagnosa').addClass('active');

        $('#btnTambahDiagnosa').click(function() {
            $('#modalDiagnosa').modal({
                backdrop: 'static',
                show: true
            });
            $('#exampleModalLabel').html('Tambah Diganosa');
            $('#btnTambah').val('Tambah');
            $('#operation').val('Tambah');
            $('#kode_diagnosa').val('');
            $('#nama_diagnosa').val('');
            $('#keterangan').val('');
        })

        $('#formDiagnosa').submit(function(e) {
            e.preventDefault();
            var id_diagnosa = $('#id_diagnosa').val();
            var kode_diagnosa = $('#kode_diagnosa').val();
            var nama_diagnosa = $('#nama_diagnosa').val();
            var keterangan = $('#keterangan').val();
            var operation = $('#operation').val();
            if (kode_diagnosa != '' && nama_diagnosa != '' && keterangan != '') {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id_diagnosa: id_diagnosa,
                        kode_diagnosa: kode_diagnosa,
                        nama_diagnosa: nama_diagnosa,
                        keterangan: keterangan,
                        operation: operation
                    },
                    url: 'doDiagnosa',
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

        $(document).on('click', '.editDiagnosa', function() {
            var id = $(this).attr('id');
            $('#modalDiagnosa').modal('show');
            $('#exampleModalLabel').html('Edit Diagnosa');
            $('#id_diagnosa').val(id);
            $('#btnTambah').val('Edit');
            $('#operation').val('Edit');
            $.ajax({
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                url: 'diagnosaById',
                success: function(result) {
                    $('#kode_diagnosa').val(result.kode_diagnosa);
                    $('#nama_diagnosa').val(result.nama_diagnosa);
                    $('#keterangan').val(result.keterangan)
                }
            })
        })

        $(document).on('click', '.deleteDiagnosa', function() {
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
                        url: 'deleteDiagnosa',
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