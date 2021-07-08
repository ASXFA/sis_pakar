<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Selamat Datang</h3>
			</div>
			<div class="box-body">
				<p>Selamat datang di Aplikasi Sistem Pakar Metode CF (Certainty Factor) Net Belief</p>
				<p>Silahkan pilih menu disamping untuk melakukan pengolahan data</p>
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Konsultasi Terbaru</h3>
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
								<th>Diagnosa</th>
								<th>Hasil/Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							if (!empty($listKonsultasi)) {
								foreach ($listKonsultasi as $k) :
									$nama_diagnosa = "";
									$nilai = 0;
							?>
									<td><?= $no ?></td>
									<td><?= $k->nama ?></td>
									<td><?= $k->jk ?></td>
									<td><?= $k->tgl_lahir ?></td>
									<td><?= $k->telepon ?></td>
							<?php
									foreach ($listDetail as $d) :
										if ($d->id_konsul == $k->id_konsul) :
											$nilai = $d->nilai;
											foreach ($listDiagnosa as $diag) :
												if ($diag->id_diagnosa == $d->id_diagnosa) :
													$nama_diagnosa = $diag->nama_diagnosa;
													break;
												endif;
											endforeach;
											break;
										endif;
									endforeach;
									echo "<td>" . $nama_diagnosa . "</td>";
									echo "<td>" . $nilai . "</td>";
									echo "</tr>";
									$no++;
								endforeach;
							} else {
								echo "<tr><td colspan='7' class='text-center'>Data Tidak Ada </td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
	$(function() {
		$('#page-beranda').addClass('active');
	})
</script>