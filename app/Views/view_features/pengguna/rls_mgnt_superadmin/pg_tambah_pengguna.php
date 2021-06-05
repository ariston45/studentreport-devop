<div class="card-box mb-30">
	<div class="pd-20">
		<h6>Tambah Pengguna</h6>
		<p style="font-size: 14px;"> Olah data user manajemen.</p>
		<hr style="margin-bottom: 0px;">
	</div>
	<div class="pd-20 pt-0">
		<form autocomplete="off" action="<?= base_url('pengguna/eksekusi-tambah-pengguna') ?>" method="post" enctype="multipart/form-data">
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
						<option value="MGNT_SUPERADMIN">Super Admin</option>
						<option value="MGNT_ADMIN">Admin</option>
						<option value="MGNT_MARKETING">Markrting</option>
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
</div>