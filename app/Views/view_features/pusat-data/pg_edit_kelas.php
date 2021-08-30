<style>
	.badge {
		padding: 0.50em;
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
		<b>Perbarui Kelas</b><br>
		Perbarui data kelas.
	</p>
	<hr>
	<!-- # -->
	<div class="mb-20">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-edit-kelas') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<input name="id" type="hidden" value="<?=$data['kelas']['cls_id']?>">
				<label class="col-sm-12 col-md-3 col-form-label">Nama Kelas</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Nama Kelas .." value="<?= $data['kelas']['cls_name'] ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih tingkatan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='tingkat' id='tingkat'>
						<option value="<?= $data['kelas']['cls_level'] ?>"><?= $data['kelas']['cls_level'] ?></option>
						<?php
						$a = 1;
						while ($a <= $data['lambel']) {
						?>
							<option value="Tingkat.<?= $a ?>">Tingkat.<?= $a ?></option>
						<?php
							$a++;
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Jurusan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='jurusan' id='jurusan'>
						<option value="<?= $data['kelas']['cls_id_major'] ?>"><?= $data['kelas']['mo_name'] ?></option>
						<?php
						foreach ($data['jurusan'] as $key => $value) {
							echo '<option value="' . $value['mo_id'] . '">' . $value['mo_name'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</div>
		</form>
	</div>
	<?php if (!empty(session()->getFlashdata('notif_email_error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Kesalahan email.</b>
			<hr>
			<?php echo session()->getFlashdata('notif_email_error'); ?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Gagal.</b>
			<hr>
			<?php echo session()->getFlashdata('error'); ?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Berhasil.</b>
			<hr>
			<?php echo session()->getFlashdata('success'); ?>
		</div>
	<?php endif; ?>
</div>