<style>
	.badge {
		padding: 0.50em;
	}
	.col-form-label {
		height: 35px;
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
		<b>Memasukan Nilai Manual</b><br>
		Data nilai dapat diinputkan secara manual satu per satu, apabila terjadi data nilai siswa terselip pada waktu mengunggah data nilai format excel.
	</p>
	<hr>
	<!-- # -->
	<div class="col-sm-12 mb-20 pd-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-nilai-manual') ?>" method="post" enctype="multipart/form-data">
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
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Siswa</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='siswa' id='siswa'>
						<option value="<?= false ?>">Pilih siswa...</option>
					</select>
				</div>
			</div>
			<div class="form-group row" style="margin-bottom: 0px;">
				<div class="col-sm-12 col-md-12">
					<button class="btn btn-success btn-sm add-more" type="button"> <i class="icon-copy dw dw-add"></i> Tambah Kreteria Penilaian</button>
					<div class="row group-in after-add-more">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Kriteria</label>
								<input type="text" name="kriteria[]" class="form-control fh-35">
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Variabel</label>
								<select class="custom-select col-12 fh-35" name='variabel[]' id='variabel'>
									<option value="<?= FALSE ?>">Variabel...</option>
									<?php
									foreach ($data['variabel'] as $key => $value) {
										echo '<option value="' . $value['var_code'] . '">('.$value['var_code'].') - ' . $value['var_name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Nilai</label>
								<input type="text" name="nilai[]" class="form-control fh-35">
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Max. Nilai</label>
								<input type="text" name="skor[]" class="form-control fh-35" value="100">
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<label class="col-form-label fh-35">Keterangan</label>
								<input type="text" name="feedback[]" class="form-control fh-35">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			</div>
		</form>
	</div>

	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Unggah Nilai Gagal</b>
			<hr>
			<?php
			$notif[0] = session()->getFlashdata('error_evaluasi');
			$notif[1] = session()->getFlashdata('error_mapel');
			$notif[2] = session()->getFlashdata('error_jurusan');
			$notif[3] = session()->getFlashdata('error_kelas');
			$notif[4] = session()->getFlashdata('error_siswa');
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
<div class="copy" style="display: none;">
	<div class="row group-in">
		<div class="col-md-4 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Kriteria</label>
				<input type="text" name="kriteria[]" class="form-control fh-35">
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Variabel</label>
				<select class="custom-select col-12 fh-35" name='variabel[]' id='variabel'>
					<option value="<?= FALSE ?>">Variabel...</option>
					<?php
					foreach ($data['variabel'] as $key => $value) {
						echo '<option value="' . $value['var_code'] . '">('.$value['var_code'].') - ' . $value['var_name'] . '</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-1 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Nilai</label>
				<input type="text" name="nilai[]" class="form-control fh-35">
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Max. Nilai</label>
				<input type="text" name="skor[]" class="form-control fh-35" value="100">
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
			<div class="form-group">
				<label class="col-form-label fh-35">Keterangan</label>
				<input type="text" name="feedback[]" class="form-control fh-35">
			</div>
		</div>
		<div class="col-md-1 col-sm-12">
			<p>
				<button class="btn btn-danger btn-sm remove" type="button"> <i class="icon-copy dw dw-trash1"></i></button>
			</p>
		</div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".add-more").click(function() {
			var html = $(".copy").html();
			$(".after-add-more").after(html);
		});
		$("body").on("click", ".remove", function() {
			$(this).parents(".group-in").remove();
		});
	});
</script>