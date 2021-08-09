<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $page ?></h3>
                <div class="button-right">
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnTambahPengetahuan">Tambah Basis Pengetahuan</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Diagnosa</th>
                                <th>Gejala</th>
                                <th>MB</th>
                                <th>MD</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($listPengetahuan)) {
                                foreach ($listPengetahuan as $p) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $p->kode_diagnosa ?> - <?= $p->nama_diagnosa ?></td>
                                        <td><?= $p->kode_gejala ?> - <?= $p->nama_gejala ?></td>
                                        <td><?= $p->mb ?></td>
                                        <td><?= $p->md ?></td>
                                        <td>
                                            <button class='btn btn-warning btn-sm mr-2 editPengetahuan' id='<?= $p->id_b_pengetahuan ?>' title='Edit Basis Pengetahuan'><i class='fa fa-edit'></i></button>
                                            <button class='btn btn-danger btn-sm mr-2 deletePengetahuan' id='<?= $p->id_b_pengetahuan ?>' title='Delete Basis Pengetahuan'><i class='fa fa-trash'></i></button>
                                        </td>
                                    </tr>
                            <?php $no++;
                                endforeach;
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
<div class="modal fade" id="modalPengetahuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel"></h5>
            </div>
            <form id="formPengetahuan" a method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Kode Gejala</label>
                        <div class="col-lg-12">
                            <select class="selectpicker form-control" data-live-search="true" name="id_diagnosa" id="id_diagnosa" required>
                                <option value="">Pilih...</option>
                                <?php foreach ($diagnosa as $d) : ?>
                                    <option value="<?= $d->id_diagnosa ?>"><?= $d->nama_diagnosa ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Nama Gejala</label>
                        <div class="col-lg-12">
                            <select class="selectpicker form-control" data-live-search="true" name="id_gejala" id="id_gejala" required>
                                <option value="">Pilih...</option>
                                <?php foreach ($gejala as $g) : ?>
                                    <option value="<?= $g->id_gejala ?>"><?= $g->nama_gejala ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">MD</label>
                        <div class="col-lg-12">
                            <input type="number" step="0.01" min="0" id="mb" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">MD</label>
                        <div class="col-lg-12">
                            <input type="number" step="0.01" min="0" id="md" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_pengetahuan" hidden>
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
        $('#page-pengetahuan').addClass('active');

        $('#btnTambahPengetahuan').click(function() {
            $('#modalPengetahuan').modal({
                backdrop: 'static',
                show: true
            });
            $('#exampleModalLabel').html('Tambah Basis Pengetahuan');
            $('#btnTambah').val('Tambah');
            $('#operation').val('Tambah');
            $('#id_diagnosa').val("").trigger('change');
            $('#id_gejala').val("").trigger('change');
        })

        $('#formPengetahuan').submit(function(e) {
            e.preventDefault();
            var id_pengetahuan = $('#id_pengetahuan').val();
            var id_diagnosa = $('#id_diagnosa').val();
            var id_gejala = $('#id_gejala').val();
            var mb = $('#mb').val();
            var md = $('#md').val();
            var operation = $('#operation').val();
            if (id_diagnosa != '' && id_gejala != '' && mb != '' && md != '') {
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id_pengetahuan: id_pengetahuan,
                        id_diagnosa: id_diagnosa,
                        id_gejala: id_gejala,
                        mb: mb,
                        md: md,
                        operation: operation
                    },
                    url: 'doPengetahuan',
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

        $(document).on('click', '.editPengetahuan', function() {
            var id = $(this).attr('id');
            $('#modalPengetahuan').modal('show');
            $('#exampleModalLabel').html('Edit Pengetahuan');
            $('#id_pengetahuan').val(id);
            $('#btnTambah').val('Edit');
            $('#operation').val('Edit');
            $.ajax({
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                url: 'pengetahuanById',
                success: function(result) {
                    $('#id_diagnosa').val(result.id_diagnosa).trigger('change');
                    $('#id_gejala').val(result.id_gejala).trigger('change');
                    $('#mb').val(result.mb);
                    $('#md').val(result.md);
                }
            })
        })

        $(document).on('click', '.deletePengetahuan', function() {
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
                        url: 'deletePengetahuan',
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