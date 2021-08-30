<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 13px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<div class="mb-10">
		<p style="font-size: 13px;">
			<b>Perbarui Data Mata Pelajaran</b> 
			<br> 
			Perbarui nama mata pelajaran, tingkatan mata pelajaran, nilai minimum untuk ketuntasan atau KKM serta Kelompok Matapelajaran.
		</p>
	</div>
	<hr>
	<div class="mb-20">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-update-pelajaran'.'/'.$data['mapel']['suc_subject_id']) ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama Mata Pelajaran</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Nama mata pelajaran .." value="<?= $data['mapel']['suc_name'] ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Tingkatan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='tingkatan' id='tingkatan'>
						<option value="<?= $data['mapel']['suc_level'] ?>"><?= $data['mapel']['suc_level'] ?></option>
						<option value="<?= false ?>">Pilih tingkatan...</option>
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
				<label class="col-sm-12 col-md-3 col-form-label">Kriteria Ketutasan Minimal (KKM)</label>
				<div class="col-sm-12 col-md-9">
					<input type="number" name="kkm" class="form-control col-12 fh-35" value="<?=$data['mapel']['suc_minimum_score']?>" placeholder="Kriteria Ketutasan Minimal ..">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Kelompok Mata Pelajaran</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='kelompok' id='kelompok'>
						<option value="<?= $data['mapel']['suc_group']?>"><?=$data['mapel']['gp_name']?></option>
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
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
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