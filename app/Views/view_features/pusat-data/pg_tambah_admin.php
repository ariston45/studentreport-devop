<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Pusat Data - <?=$content['pg_title']?></h6>
	<p style="font-size: 13px;" class="mb-15"><?=$content['pg_subtitle']?></p>
	<hr>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Tambah User Admin</b><br>
		Tambahkan data user administrasi sekolah.
	</p>
	<hr>
	<!-- # -->
	<div class="mb-20">
		<p><b>Tambah User Administrasi</b></p>
		<form autocomplete="off" action="<?= base_url($content['pg_menu_url'] . '/eksekusi-tambah-admin') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Nama" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Alamat</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="alamat" class="form-control col-12 fh-35" placeholder="Alamat" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">HP / Telepon</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="telepon" class="form-control col-12 fh-35" placeholder="+62 000 0000 00000" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Jabatan</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="jabatan" class="form-control col-12 fh-35" placeholder="Contoh : staff admin" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Hak Akses</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name="akses" id="akses">
						<option value="">Pilih hak akses...</option>
						<option value="TNT_SUPERADMIN">Super Admin</option>
						<option value="TNT_ADMIN">Admin</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Email</label>
				<div class="col-sm-12 col-md-9">
					<input type="email" name="email" class="form-control col-12 fh-35" placeholder="example@domain.com" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Password</label>
				<div class="col-sm-12 col-md-9">
					<input type="password" name="password" class="form-control col-12 fh-35" placeholder="*******" autocomplete="new-password">
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</div>
		</form>
	</div>
		<?php if (!empty(session()->getFlashdata('notif_akses_error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Gagal.</b>
			<hr>
			<?php echo session()->getFlashdata('notif_akses_error'); ?>
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