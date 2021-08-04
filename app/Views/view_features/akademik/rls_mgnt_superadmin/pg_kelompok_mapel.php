<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Data Mata Pelajaran</b><br>
		Berikut ini data dari semua mata pelajaran, mata pelajaran dapat dikelompokan berdasarkan tingkatan.
	</p>
	<hr>
	<div style="width: 70%;">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus" style="width: 10px;">No</th>
					<th>Nama Kelompok</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['kelompok'] as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['gp_name'] ?></td>
						<td>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'] . '/update-kelompok-mapel' . '/' . $value['gp_id']) ?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
									<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'] . '/delete-kelompok-mapel' . '/' . $value['gp_id']) ?>"><i class="icon-copy dw dw-delete-3"></i> Delete</a>
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