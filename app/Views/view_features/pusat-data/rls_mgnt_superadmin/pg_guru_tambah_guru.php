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
			Tambahkan data guru.
		</p>
	</div>
	<hr>
	<div class="mb-20">
		<p><b>Tambah Mata Pelajaran</b></p>
		<form action="<?= base_url($content['pg_menu_url'].'/eksekusi-tambah-data-guru')?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama Guru</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Alamat</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="alamat" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">HP / Telepon</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="telepon" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Email</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="email" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Konfirmasi Email</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="konfirmasi_email" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Password</label>
				<div class="col-sm-12 col-md-9">
					<input type="password" name="password" class="form-control col-12 fh-35">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Konfirmasi Password</label>
				<div class="col-sm-12 col-md-9">
					<input type="password" name="konfirmasi_password" class="form-control col-12 fh-35">
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
			<?php echo session()->getFlashdata('notif_email_error');?>
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