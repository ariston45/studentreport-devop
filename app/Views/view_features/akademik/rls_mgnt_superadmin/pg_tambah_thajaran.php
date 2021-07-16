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

		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-tambah-tahun-akademik') ?>" method="post" enctype="multipart/form-data">
			<div class="mb-10">
				<p style="font-size: 13px;">
					<b>Penetapan Tahun Ajaran</b><br>
				</p>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Awal Tahun Ajaran</label>
				<div class="col-sm-12 col-md-9">
					<input name="awal" class="form-control month-picker fh-35" placeholder="Select Month" type="text" autocomplete="off">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Akhir Tahun Ajaran</label>
				<div class="col-sm-12 col-md-9">
					<input name="akhir" class="form-control month-picker fh-35" placeholder="Select Month" type="text" autocomplete="off">
				</div>
			</div>
			<div class="mb-10">
				<p style="font-size: 13px;">
					<b>Pengaturan Nilai Evaluasi</b><br>
				</p>
			</div>
			<!--  -->
			<div class="form-group row" style="margin-bottom: 0px;">
				<div class="col-sm-12 col-md-12">
					<button class="btn btn-success btn-sm add-more" type="button"> <i class="icon-copy dw dw-add"></i> Tambah Evaluasi Penilaian</button>
					<div class="row group-in">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Evaluasi</label>
								<input type="text" name="evaluasi[]" class="form-control fh-35" value="Evaluasi Tengah Semester Satu">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Tampilan Nilai</label>
								<select class="custom-select col-12 fh-35" name='bentuk_nilai[]'>
									<option value="ANGKA">ANGKA</option>
									<option value="HURUF">HURUF</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row group-in">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Evaluasi</label>
								<input type="text" name="evaluasi[]" class="form-control fh-35" value="Evaluasi Semester Satu">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Tampilan Nilai</label>
								<select class="custom-select col-12 fh-35" name='bentuk_nilai[]' id='variabel'>
									<option value="ANGKA">ANGKA</option>
									<option value="HURUF">HURUF</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row group-in">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Evaluasi</label>
								<input type="text" name="evaluasi[]" class="form-control fh-35" value="Evaluasi Tengah Semester Dua">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Tampilan Nilai</label>
								<select class="custom-select col-12 fh-35" name='bentuk_nilai[]' >
									<option value="ANGKA">ANGKA</option>
									<option value="HURUF">HURUF</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row group-in after-add-more">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Evaluasi</label>
								<input type="text" name="evaluasi[]" class="form-control fh-35" value="Evaluasi Semester Dua">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="col-form-label">Tampilan Nilai</label>
								<select class="custom-select col-12 fh-35" name='bentuk_nilai[]'>
									<option value="ANGKA">ANGKA</option>
									<option value="HURUF">HURUF</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--  -->
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

<div class="copy" style="display: none;">
	<div class="row group-in">
		<div class="col-md-6 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Evaluasi</label>
				<input type="text" name="evaluasi[]" class="form-control fh-35">
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="form-group">
				<label class="col-form-label">Tampilan Nilai</label>
				<select class="custom-select col-12 fh-35" name='bentuk_nilai[]' id='variabel'>
					<option value="ANGKA">ANGKA</option>
					<option value="HURUF">HURUF</option>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
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