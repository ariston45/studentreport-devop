<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Perbarui Data Pengguna</h6>
	<p style="font-size: 14px;"> Olah data user manajemen.</p>
	<hr>
	<div class="mb-20">
		<form action="<?= base_url('pengguna/eksekusi-update-pengguna/'.$data['id']) ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" value="<?= $data['pengguna'][0]['u_name'] ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Alamat</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="alamat" class="form-control col-12 fh-35" value="<?= $data['pengguna'][0]['u_address'] ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Jabatan</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="jabatan" class="form-control col-12 fh-35" value="<?= $data['pengguna'][0]['u_job_position'] ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">HP / Telepon</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="telepon" class="form-control col-12 fh-35" value="<?= $data['pengguna'][0]['u_phone'] ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Hak Akses</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name="akses" id="akses">
						<option value="<?= $data['pengguna'][0]['u_rules_access'] ?>">
							<?php
							if ($data['pengguna'][0]['u_rules_access'] == 'TNT_SUPERADMIN') {
								echo "Super Admin";
							} else {
								echo "Admin";
							}
							?>
						</option>
						<option value="MGNT_SUPERADMIN">Super Admin</option>
						<option value="MGNT_ADMIN">Admin</option>
						<option value="MGNT_MARKETING">Markrting</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Email</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="email" class="form-control col-12 fh-35" value="<?= $data['pengguna'][0]['u_email'] ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Password</label>
				<div class="col-sm-12 col-md-9">
					<input type="password" name="password" class="form-control col-12 fh-35" placeholder="*****" autocomplete="off">
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			</div>
		</form>
	</div>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Berhasil.</b>
			<hr>
			<?php echo session()->getFlashdata('success'); ?>
		</div>
	<?php endif; ?>
</div>