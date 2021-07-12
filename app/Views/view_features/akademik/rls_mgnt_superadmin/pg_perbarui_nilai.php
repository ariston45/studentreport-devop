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
		<b>Perbarui Data Nilai</b><br>
		Data nilai yang sudah terunggah dapat diperbarui apabila terjadi kesalah pada waktu input. Untuk memperbaruinya silakan inputkan data filter pada form di bawah ini.
		Perlu diperhatikan perbaruan nilai dilakukan secara manual pada setiap siswa.
	</p>
	<hr>
	<!-- # -->
	<div class="col-sm-12 mb-20 pd-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-perbarui-nilai') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Tahun Ajaran</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='thajaran' id='thajaran'>
						<option value="<?= $data['tahunaktif']['aca_id'] ?>"><?= $data['tahunaktif']['ach_years'] ?></option>
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
					<select class="custom-select col-12 fh-35" name='kategori' id='kategori'>
						<option value="<?= false ?>">Pilih kategori evaluasi...</option>
						<?php
						foreach ($data['kategori'] as $key => $value) {
							echo '<option value="' . $value['cat_id'] . '">' . $value['cat_category_name'] . '</option>';
						}
						?>
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
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-outline-primary">Filter Data</button>
			</div>
		</form>
	</div>
	<?php if (isset($_SESSION['filterdatanilai'])) : ?>
		<hr>
		<?php $data = $_SESSION['filtertitle']; ?>
		<p>
			<a href="<?= base_url($content['pg_menu_url'] . '/clear-datafilter'); ?>">
				<button type="button" class="btn btn-light btn-sm"><i class="icon-copy dw dw-delete-3"></i> Bersihkan Data</button>
			</a>
		</p>
		<p style="text-align: center;">
			Data Nilai <b><?= $data['evaluasi'] ?></b> Kelas <b><?= $data['kelas'] ?></b> Tahun Ajaran <b><?= $data['tahun'] ?></b>
		</p>
		<table class="table table-bordered" id="dt">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Kriteria Penilaian</th>
					<th>Nilai</th>
					<th>Feedback</th>
					<th>Nilai Akhir</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $n = 1; ?>
				<?php foreach ($_SESSION['filterdatanilai'] as $key => $value) {
					$cn = Count($value['nilai']); ?>
					<tr>
						<td rowspan="<?= $cn ?>"><?= $n ?></td>
						<td rowspan="<?= $cn ?>"><?= $value['idsiswa'] ?></td>
						<td rowspan="<?= $cn ?>"><?= $value['nama'] ?></td>
						<td rowspan="<?= $cn ?>"><?= $value['email'] ?></td>
						<td><?= $value['nilai'][0]['raw_title'] ?></td>
						<td><?= $value['nilai'][0]['raw_point'] ?></td>
						<td><?= $value['nilai'][0]['raw_feedback'] ?></td>
						<td rowspan="<?= $cn ?>"><?= $value['nilaiakhir'] ?></td>
						<td rowspan="<?= $cn ?>">
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a href="<?= base_url($content['pg_menu_url'] . '/form-perbarui-nilai' . '/' . $value['idsiswa']); ?>" class="dropdown-item ">
										<i class="icon-copy dw dw-edit2"></i> Perbarui Nilai
									</a>
								</div>
							</div>
						</td>
					</tr>
					<?php foreach ($value['nilai'] as $key => $subvalue) {
						if ($key != 0) { ?>
							<tr>
								<td><?= $subvalue['raw_title'] ?></td>
								<td><?= $subvalue['raw_point'] ?></td>
							</tr>
					<?php }
					} ?>
				<?php $n++;
				} ?>
			</tbody>
		</table>
	<?php endif; ?>

	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Unggah Nilai Gagal</b>
			<hr>
			<?php
			$notif[0] = session()->getFlashdata('error_kategori');
			$notif[1] = session()->getFlashdata('error_mapel');
			$notif[2] = session()->getFlashdata('error_jurusan');
			$notif[3] = session()->getFlashdata('error_kelas');
			foreach ($notif as $key => $value) {
				if (!empty($value)) {
					echo '<li>' . $value . '</li>';
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
<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
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