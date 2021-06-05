<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Pusat Data - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 13px;" class="mb-15"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Detail Data Guru</b><br>
		Data detail mengenai guru
	</p>
	<hr>
	<!-- # -->
	<p class="mb-10" style="font-size: 13px;">
		<b>Profil Guru</b>
	</p>

	<div class="pb-10">
		<a href="<?= base_url($content['pg_tambah_mapel_url'] . '/tambah-pelajaran') ?>">
			<button type="button" class="btn btn-secondary btn-sm">Edit Profil Guru</button>
		</a>
	</div>

	<dl class="row mb-0" style="font-size: 13px;">
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<dt class="col-sm-4">Nama Guru</dt>
				<dd class="col-sm-8 mb-0"><?= $data['guru'][0]['u_name'] ?></dd>
				<dt class="col-sm-4">Alamat</dt>
				<dd class="col-sm-8 mb-0"><?= $data['guru'][0]['u_address'] ?></dd>
				<dt class="col-sm-4">Alamat Email</dt>
				<dd class="col-sm-8 mb-0"><?= $data['guru'][0]['u_email'] ?></dd>
				<dt class="col-sm-4">Telepon</dt>
				<dd class="col-sm-8 mb-0"><?= $data['guru'][0]['u_phone'] ?></dd>
			</dl>
		</dd>
	</dl>
	<hr>
	<p class="mb-10" style="font-size: 13px;">
		<b>Daftar Mata Pelajaran</b>
	</p>
	<div class="pb-10">
		<a href="<?= base_url($content['pg_tambah_mapel_url'] . '/tambah-pelajaran') ?>">
			<button type="button" class="btn btn-secondary btn-sm">Tambah Pelajaran</button>
		</a>
	</div>

	<table class="data-table table stripe hover nowrap" id="dt">
		<thead>
			<tr>
				<th class="table-plus">No</th>
				<th>Mata Pelajaran</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th class="datatable-nosort">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data['mapel'] as $key => $value) { ?>
				<tr>
					<td class="table-plus"><?= $no ?></td>
					<td><?= $value['suc_name'] ?></td>
					<td><?= $value['cls_name'] ?></td>
					<td><?= $value['mo_name'] ?></td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="<?= base_url($content['pg_tambah_mapel_url'] . '/tambah-pelajaran') ?>"><i class="dw dw-eye"></i> Edit</a>
								<a class="dropdown-item" href="<?= base_url($content['pg_tambah_mapel_url'] . '/tambah-pelajaran') ?>"><i class="dw dw-eye"></i> Remove</a>
							</div>
						</div>
					</td>
				</tr>
			<?php $no++;
			} ?>
		</tbody>
	</table>
</div>