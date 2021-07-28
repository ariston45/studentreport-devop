<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		Perbarui nama kategori evaluasi.
	</p>
	<hr style="margin-top:5px">
	<div class="col-sm-8 pl-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-update-kategori' . '/' . $data['kategori']['cat_acad_id']) ?>" method="POST">
			<div class="form-group">
				<label>Nama Kategori Evaluasi</label>
				<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Contoh: Evaluasi 1" autocomplete="off" value="<?= $data['kategori']['cat_category_name'] ?>">
			</div>
			<div class="form-group">
				<label>Bentuk Nilai</label>
				<select class="custom-select col-12 fh-35" name="bentuk_nilai" id="bentuk_nilai">
					<option value="<?=$data['kategori']['cat_value_form']?>"><?=$data['kategori']['cat_value_form']?></option>
					<option value="ANGKA">ANGKA</option>
					<option value="HURUF">HURUF</option>
				</select>
			</div>
			<input type="hidden" name="id" value="<?=$data['kategori']['cat_id']?>">
			<div class="text-right">
				<a href="<?= base_url($content['pg_menu_url'] . '/kategori-penilaian') ?>">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
				</a>
				<button type="Submit" class="btn btn-sm btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>