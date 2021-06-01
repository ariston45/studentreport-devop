<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<hr>
	<p style="font-size: 14px;">
		Update nama tahun akademik.
	</p>
	<div class="col-sm-8 pl-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-update-thakad' . '/' . $data['akad'][0]['aca_id']) ?>" method="POST">
			<div class="form-group">
				<label>Tahun Akademik</label>
				<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="contoh: ulangan harian 1" autocomplete="off" value="<?= $data['akad'][0]['ach_years'] ?>">
			</div>
			<div class="text-right">
				<a href="<?= base_url($content['pg_menu_url'] . '/variable-penilaian') ?>">
					<button type="reset" class="btn btn-sm btn-secondary" ><i class="icon-copy dw dw-cancel"></i> Batal</button>
				</a>
				<button type="Submit" class="btn btn-sm btn-primary"><i class="icon-copy dw dw-diskette1"></i> Simpan</button>
			</div>
		</form>
	</div>
</div>