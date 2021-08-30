<div class="card-box mb-30">
	<div class="pd-20">
		<h6>Pusat Data</h6>
		<p style="font-size: 14px;">Pusat pengolahan data siswa, data wali murid, serta data guru.</p>
		<!-- <hr style="margin-bottom: 0px;"> -->
	</div>
	<div class="pb-20">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus" style="width: 20px;">No</th>
					<th>Nama Sekolah</th>
					<th class="datatable-nosort" style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['sch_name'] ?></td>
						<td style="text-align: center;">
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?= base_url('pusat-data/' . strtolower($value['sch_id']) . '/profil-sekolah') ?>"><i class="dw dw-eye"></i> View</a>
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