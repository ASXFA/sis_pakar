<div class="content-wrapper">
    <div class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $page ?></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($listKonsultasi)) {
                                foreach ($listKonsultasi as $g) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $g->nama ?></td>
                                        <td><?= $g->jk ?></td>
                                        <td><?= date('d F Y', strtotime($g->tgl_lahir)) ?></td>
                                        <td><?= $g->telepon ?></td>
                                        <td>
                                            <button class='btn btn-info btn-sm mr-2 detailKonsul' id='<?= $g->id_konsul ?>' title='Detail Konsultasi'><i class='fa fa-eye'></i></button>
                                            <button class='btn btn-danger btn-sm mr-2 deleteKonsul' id='<?= $g->id_konsul ?>' title='Delete Konsultasi'><i class='fa fa-trash'></i></button>
                                            <a target="_blank" href="<?= base_url() ?>frontend/cetak/<?= $g->id_konsul ?>" class='btn btn-success btn-sm mr-2 download' title='Download Konsultasi'><i class='fa fa-download'></i></button>
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
<div class="modal fade" id="modalKonsul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel"></h5>
            </div>
            <div class="row">
                <div class="col-md-12" id="detail">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<script>
    $(function() {
        $('#page-konsultasi').addClass('active');

        $(document).on('click', '.detailKonsul', function() {
            var id = $(this).attr('id');
            $('#modalKonsul').modal('show');
            $('#exampleModalLabel').html('Detail Konsul');
            $.ajax({
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                url: 'konsulById',
                success: function(result) {
                    html = '';
                    html += '<div class="box">';
                    html += '<div class="box-body">';
                    html += '<h4> Gejala yang dipilih </h4>';
                    html += '<table class="table table-bordered">';
                    html += '<thead>';
                    html += '<th> No </th>';
                    html += '<th> Nama Gejala </th>';
                    html += '</thead>';
                    html += '<tbody>';
                    for (let i = 0; i < result.temp.length; i++) {
                        html += '<tr>'
                        html += '<td>' + (i + 1) + '</td>'
                        html += '<td>' + result.temp[i].nama_gejala + '</td>'
                        html += '</tr>'
                    }
                    html += '</tbody>';
                    html += '</table>'
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="box">';
                    html += '<div class="box-body">';
                    html += '<h4> Hasil Perhitungan </h4>';
                    html += '<table class="table table-bordered">';
                    html += '<thead>';
                    html += '<th> No </th>';
                    html += '<th> Nama Diagnosa </th>';
                    html += '<th> Nilai </th>';
                    html += '</thead>';
                    html += '<tbody>';
                    for (let i = 0; i < result.detail.length; i++) {
                        html += '<tr>'
                        html += '<td>' + (i + 1) + '</td>'
                        html += '<td>' + result.detail[i].nama_diagnosa + '</td>'
                        html += '<td>' + result.detail[i].nilai + '</td>'
                        html += '</tr>'
                    }
                    html += '</tbody>';
                    html += '</table>'
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="box">';
                    html += '<div class="box-body">';
                    html += '<h4> Hasil Perhitungan </h4>';
                    html += '<table class="table table-bordered">';
                    html += '<thead>';
                    html += '<th> Hasil Diagnosa </th>';
                    html += '<th> Penanganan </th>';
                    html += '</thead>';
                    html += '<tbody>';
                    for (let i = 0; i < result.detail.length; i++) {
                        html += '<tr>'
                        html += '<td>' + result.detail[i].nama_diagnosa + '</td>'
                        html += '<td style="white-space: pre-wrap; word-wrap: break-word;">' + result.detail[i].keterangan + '</td>'
                        html += '</tr>'
                        if (i === 0) {
                            break;
                        }
                    }
                    html += '</tbody>';
                    html += '</table>'
                    html += '</div>';
                    html += '</div>';
                    $('#detail').html(html);
                }
            })
        })

        $(document).on('click', '.deleteKonsul', function() {
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
                        url: 'deleteKonsul',
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