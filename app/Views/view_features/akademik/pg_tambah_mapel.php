<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<div class="mb-10">
		<p style="font-size: 13px;">
			<b>Tambah Mata Pelajaran</b><br>
			Tambahkan data mata pelajaran.
		</p>
	</div>
	<hr>
	<div class="mb-20">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-tambah-pelajaran') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama Mata Pelajaran</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Nama mata pelajaran ..">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Tingkatan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='tingkatan' id='tingkatan'>
						<option value="<?= false ?>">Pilih tingkatan...</option>
						<?php
						$a = 1;
						while ($a <= $data['lambel']) {
						?>
						<option value="Tingkat_<?=$a?>">Tingkat.<?=$a?></option>
						<?php
						$a++;
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Kriteria Ketutasan Minimal (KKM)</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="kkm" class="form-control col-12 fh-35" placeholder="Kriteria Ketutasan Minimal ..">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Kelompok Mata Pelajaran</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='kelompok' id='kelompok'>
						<option value="<?= false ?>">Pilih kelompok...</option>
						<?php
						foreach ($data['kelompok'] as $key => $value) { ?>
							<option value="<?= $value['gp_id'] ?>"><?= $value['gp_name']?></option>
						<?php }
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