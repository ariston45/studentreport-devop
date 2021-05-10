<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<div class="mb-10">
		<p style="font-size: 14px;">
			Tambahkan mata pelajaran yang akan diajrkan guru.
		</p>
	</div>
	<hr>
	<div class="mb-20">
		<p><b>Tambah Mata Pelajaran</b></p>
		<form action="<?= base_url($content['pg_tambah_mapel_url'] . '/eksekusi-tambah-data-mapel-guru') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Mata Pelajaran</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='mapel' id='mapel'>
						<option value="<?= false ?>">Pilih mata pelajaran...</option>
						<?php foreach ($data['semuamapel'] as $key => $value) { ?>
							<option value="<?php echo $value['suc_subject_id'];?>"><?php echo $value['suc_name'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Jurusan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='jurusan' id='jurusan'>
						<option value="<?= false ?>">Pilih jurusan...</option>
						<?php
						foreach ($data['jurusan'] as $key => $value) {
							echo '<option value="' . $value['mo_id'] . '">' . $value['mo_name'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Kelas</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='kelas' id='kelas'>
						<option value="<?= false ?>">Pilih kelas...</option>
					</select>
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</div>
		</form>
	</div>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Berhasil.</b>
			<hr>
			<?php echo session()->getFlashdata('success');?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Gagal.</b>
			<hr>
			<?php echo session()->getFlashdata('error');?>
		</div>
	<?php endif; ?>
</div>