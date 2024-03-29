<div class="card-box mb-30">
	<div class="pd-20">
		<h6>Rapor Siswa</h6>
		<p style="font-size: 13px;">Laporan hasil evaluasi siswa yang meliputi evaluasi tengah semester satu maupun dua serta evaluasi akhir semester satu dan dua (ganjil/genap).</p>
		<!-- <hr style="margin-bottom: 0px;"> -->
	</div>
	<div class="pb-20">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus" style="width: 20px;">No</th>
					<th>Nama Sekolah</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['sch_name'] ?></td>
						<td>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?= base_url('rapor-siswa/' . strtolower($value['sch_id']) . '/cari-rapor-siswa') ?>"><i class="dw dw-eye"></i> View</a>
								</div>
							</div>
						</td>
					</tr>
				<?php $no++;
				} ?>
			</tbody>
		</table>
	</div>
</div>