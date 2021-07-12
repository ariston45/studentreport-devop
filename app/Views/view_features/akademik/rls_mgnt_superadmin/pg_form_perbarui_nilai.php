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
	<div class="col-sm-8 mb-20 pd-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-form-perbarui-nilai'.'/'.$data['id']) ?>" method="post" enctype="multipart/form-data">
			<?php $n=1; foreach ($data['filterdata'] as $key => $value) { ?>
				<div class="form-group row">
					<div class="col-sm-12 col-md-12">
						<p><?=$n?> . <?=$value['raw_title']?></p>	
					</div>
					<label class="col-sm-12 col-md-2 col-form-label text-right">Nilai</label>
					<div class="col-sm-12 col-md-10" style="padding-bottom: 5px;">
						<input type="text" name="nilai[<?=$value['raw_id']?>]" class="form-control col-12 fh-35" value="<?=$value['raw_point']?>" autocomplete="off">
					</div> <br>
					<label class="col-sm-12 col-md-2 col-form-label text-right">Feedback</label>
					<div class="col-sm-10 col-md-10">
						<input type="text" name="feedback[<?=$value['raw_id']?>]" class="form-control col-12 fh-35" value="<?=$value['raw_feedback']?>" autocomplete="off">
					</div>
				</div>
			<?php $n++; } ?>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
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