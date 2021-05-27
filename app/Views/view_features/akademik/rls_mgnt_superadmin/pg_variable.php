<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<hr>
	<p style="font-size: 14px;">
		Variabel penilaian digunakan untuk mengelompokan kreteria penilaian.
	</p>
	<button class="btn btn-sm btn-dark mb-20" data-toggle="modal" data-target="#Medium-modal"><i class="icon-copy dw dw-add"></i> Tambah variabel</button>
	<div class="col-sm-8 pl-0">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus" style="width: 8px;">No</th>
					<th>Kode Variabel</th>
					<th>Nama Variabel Penilaian</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['variable'] as $key => $value) { ?>
					<tr>
						<td class="table-plus"><?= $no ?></td>
						<td><?= $value['var_code'] ?></td>
						<td><?= $value['var_name'] ?></td>
						<td>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/update-variable'.'/'.$value['var_id']) ?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
									<a class="dropdown-item" href="#"><i class="icon-copy dw dw-delete-3"></i> Delete</a>
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
<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Tambahkan Variable</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-tambah-variable') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Variabel</label>
						<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="contoh: ulangan harian 1" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" class="btn btn-sm btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>