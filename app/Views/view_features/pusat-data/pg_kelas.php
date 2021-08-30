<style>
	.table thead th {
		padding-top: 2px;
		padding-bottom: 2px;
	}

	.table-responsive {
		margin-top: 20px;
	}

	p {
		font-size: 13px;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Pusat Data - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 13px;" class="mb-15"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Kelas</b><br>
		Manajemen data Kelas.
	</p>
	<!-- # -->
	<div class="table-responsive">
		<table class="table table-striped" id="dt">
			<thead>
				<tr>
					<th class="table-plus">No</th>
					<th>Kelas</th>
					<th style="text-align: center;">Jurusan</th>
					<th style="text-align: center;">Jumlah Siswa</th>
					<th class="datatable-nosort" style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['kelas'] as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['kelas'] ?></td>
						<td style="text-align: center;"><?= $value['jurusan'] ?></td>
						<td style="text-align: center;"><?= $value['jml'] ?></td>
						<td style="text-align: center;">
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'] . '/edit-kelas' . '/' . $value['id']) ?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
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