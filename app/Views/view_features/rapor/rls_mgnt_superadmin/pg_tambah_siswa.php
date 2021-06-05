<style>
.badge{
	padding: 0.50em;
}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$content['pg_title']?></h4>
	<p  style="font-size: 14px;" class="mb-20"><?=$content['pg_subtitle']?></p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<div class="mb-10">
		<p style="font-size: 14px;">
			Tambahkan data siswa dengan data dari file excel atau dapat menambahkan data siswa dengan menginput data melalui form. 
			Untuk format file upload excel data siswa dapat diunduh berikut tautan di bawah ini. <br>
		</p>
	</div>
	<div class="mb-20">
		<a href="/files/Template_upload_data_siswa.xlsx">
			<span class="badge badge-pill badge-success" style="padding:'0.50em';">Unduh file excel</span>
		</a>
	</div>
	<hr>
	<div class="mb-20">
		<p><b>Upload data siswa.</b></p> 
		<form action="<?=base_url($content['pg_menu_url'].'/eksekusi-tambah-data-siswa')?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Jurusan</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='jurusan' id='jurusan'>
						<option value="<?=false?>">Pilih jurusan...</option>
						<?php
							foreach ($data['jurusan'] as $key => $value) {
								echo '<option value="'.$value['mo_id'].'">'.$value['mo_name'].'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Pilih Kelas</label>
				<div class="col-sm-12 col-md-9">
					<select class="custom-select col-12 fh-35" name='kelas' id='kelas'>
						<option value="<?=false?>">Pilih kelas...</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Upload Data Siswa</label>
				<div class="col-sm-12 col-md-9">					
					<input type="file" class="custom-file-input" id="file_excel" name="file_excel" accept=".xls,.xlsx" required>
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
			</div>
			<button type="reset" class="btn btn-sm btn-outline-secondary">Cancel</button>
			<button type="submit" class="btn btn-sm btn-outline-primary">Upload</button>
		</form>
	</div>

	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Upload Gagal</b>
			<hr>
			<?php
				$notif[0] = session()->getFlashdata('notif_dup_nis');
				$notif[1] = session()->getFlashdata('notif_dup_email');
				$notif[2] = session()->getFlashdata('notif_id_exist');
				$notif[3] = session()->getFlashdata('notif_email_exist');
				$notif[4] = session()->getFlashdata('notif_jurusan');
				$notif[5] = session()->getFlashdata('notif_kelas');
				$notif[6] = session()->getFlashdata('notif_file');
				$notif[6] = session()->getFlashdata('notif_sameemail');
				$notif[6] = session()->getFlashdata('notif_filetype');
				foreach ($notif as $key => $value) {
					if (!empty($value)) {
						echo '<li>'.$value.'</li>';
					}
				}
			?>
		</div>
  <?php endif; ?>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Upload Berhasil</b>
			<hr>
			<?php echo session()->getFlashdata('success');?>
		</div>
	<?php endif; ?>
	<hr>
</div>
