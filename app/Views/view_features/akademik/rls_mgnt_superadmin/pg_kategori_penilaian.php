<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Kategori Evaluasi</b><br>
		Berikut adalah data kategori evaluasi secara default, anda dapat menambahkan kategori evaluasi baru, mengedit nama kategori, maupun menghapus data.
	</p>
	<hr style="margin-top:5px">
	<button class="btn btn-sm btn-dark mb-20" data-toggle="modal" data-target="#Medium-modal"><i class="icon-copy dw dw-add"></i> Tambah Kategori Evaluasi</button>
	<div class="col-sm-8 pl-0">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="3">Kategori Evaluasi <?= $data['nmaktif'] ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($data['kategori'] as $key => $value) { ?>
						<tr>
							<td style="width: 5px;"><?= $no ?></td>
							<td scope="row"><?= $value['cat_category_name'] ?></td>
							<td style="text-align: right;">
								<a href="<?= base_url($content['pg_menu_url'] . '/update-kategori' . '/' . $value['cat_id']) ?>">
									<span class="badge badge-secondary">Ubah Nama</span>
								</a>
								<a href="" class="kategori" data-toggle="modal" data-target="#confirmation-modal" data-id="<?= $value['cat_id'] ?>">
									<span class="badge badge-secondary">Hapus</span>
								</a>
							</td>
						</tr>
					<?php $no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Tambahkan Kategori Evaluasi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-tambah-kategori') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kategori Evaluasi</label>
						<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Contoh: Evaluasi Belajar Semester Satu" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="Submit" class="btn btn-sm btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center font-18">
				<h4 class="padding-top-30 mb-30 weight-500">Anda akan menghapus data kategori evaluasi ini, apakah anda yakin ingin melanjutkan ?</h4>

				<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
					<div class="col-6">
						<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
						TIDAK
					</div>
					<div class="col-6">
						<form action="<?= base_url($content['pg_menu_url'] . '/hapus-kategori') ?>" method="POST">
							<input name="id" type="hidden" id="idkategori">
							<button type="submit" class="btn btn-danger border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
						</form>
						IYA
					</div>
				</div>
			</div>
		</div>
	</div>
</div>