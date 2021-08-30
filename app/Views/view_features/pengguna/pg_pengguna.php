<div class="card-box mb-30">
	<div class="pd-20">
		<h6>Pengguna</h6>
		<p style="font-size: 14px;"> Olah data user manajemen.</p>
		<hr style="margin-bottom: 0px;">
	</div>
	<div class="pd-20" style="padding-top: 0px;">
		<a href="<?= base_url('pengguna/tambah-pengguna') ?>">
			<button class="btn btn-sm btn-primary"><i class="icon-copy dw dw-add"></i> Add User</button>
		</a>
	</div>
	<div class="pb-20 pt-0">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus">No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Telepon</th>
					<th>Hak Akses</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['pengguna'] as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['u_name'] ?></td>
						<td><?= $value['u_email'] ?></td>
						<td><?= $value['u_phone'] ?></td>
						<td><?= $value['access'] ?></td>
						<td>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
									<a class="dropdown-item" href="<?= base_url('pengguna/update-pengguna/'.$value['u_id']) ?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
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