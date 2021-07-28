<style>
	.badge {
		padding: 0.50em;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 13px;" class="mb-15"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px; padding-bottom: 0px;">
		<b>Unggah Data Nilai</b><br>
		Unggah data nilai siswa per evaluasi belajar. Adapun anda dapat mengunakan format upload file excel yang dapat didownload pada ling di bawah ini.
		Agar data diupload mohon tidak mengubah format template yang sudah disediakan.<br>
		<a href="/files/Template_upload_data_siswa.xlsx">
			<span class="badge badge-pill badge-success" style="padding:'0.50em';">Unduh file excel</span>
		</a>
	</p>
	<hr>
	<!-- # -->
	<div class="col-sm-12 mb-20 pd-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-upload-nilai-part1') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Tahun Ajaran</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='thajaran' id='tahun'>
						<option value="<?= false ?>">Pilih tahun ajaran...</option>
						<?php
						foreach ($data['tahun'] as $key => $value) {
							echo '<option value="' . $value['aca_id'] . '">' . $value['ach_years'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Kategori Evaluasi</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='kategori' id='evaluasi'>
						<option value="<?= false ?>">Pilih evaluasi...</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Mata Pelajaran (Subject)</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='mapel' id='mapel'>
						<option value="<?= false ?>">Pilih mata pelajaran...</option>
						<?php
						foreach ($data['mapel'] as $key => $value) {
							echo '<option value="' . $value['suc_subject_id'] . '">' . $value['suc_name'] . '</option>';
						}
						?>
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
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Unggah File Excel</label>
				<div class="col-sm-12 col-md-9">
					<input type="file" class="custom-file-input" id="file_excel" name="file_excel" accept=".xls,.xlsx" required>
					<label class="custom-file-label" for="customFile">Pilih berkas...</label>
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Cancel</button>
				<button type="submit" class="btn btn-sm btn-outline-primary">Upload</button>
			</div>
		</form>
	</div>

	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Unggah Nilai Gagal</b>
			<hr>
			<?php
			$notif[0] = session()->getFlashdata('error_kategori');
			$notif[1] = session()->getFlashdata('error_mapel');
			$notif[2] = session()->getFlashdata('error_jurusan');
			$notif[3] = session()->getFlashdata('error_kelas');
			$notif[4] = session()->getFlashdata('error_data');
			foreach ($notif as $key => $value) {
				if (!empty($value)) {
					if ($key == 4) {
						echo $value;
					}else {
						echo '<li>' . $value . '</li>';
					}
				}
			}
			?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Upload Berhasil</b>
			<hr>
			<?php echo session()->getFlashdata('success'); ?>
		</div>
	<?php endif; ?>
</div>