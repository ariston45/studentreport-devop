<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Update Variabel</b><br>
		Update nama variabel penilaian.
	</p>
	<hr>
	<div class="col-sm-8 pl-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-update-variable' . '/' . $data['variable']['var_id']) ?>" method="POST">
			<div class="form-group">
				<label>Nama Variabel</label>
				<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="contoh: ulangan harian 1" autocomplete="off" value="<?= $data['variable']['var_name'] ?>">
			</div>
			<div class="text-right">
				<a href="<?= base_url($content['pg_menu_url'] . '/variable-penilaian') ?>">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
				</a>
				<button type="Submit" class="btn btn-sm btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>