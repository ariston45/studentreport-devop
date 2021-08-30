<style>
	.badge {
		padding: 0.50em;
	}
	p {
		font-size: 13px;
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
	<p>
		<b><i>Instruksi:</i></b><br>
		<button type="button" class="btn btn-outline-dark" style="text-align: left; font-size:13px; margin-bottom: 5px; margin-top: 5px;">Rumus Penilaian: <br> R = <?=$data['rumus'][0]['cat_formula_asses']?></button> <br>
		<?php
		if (isset($data['rumus'][0]['cat_formula_asses'])) {
			echo 'Pilihlah variabel pada form di bawah sesuai dengan variabel rumus penilaian diatas.';
		}else {
			echo 'Mohon maaf rumus penilaian kategori evaluasi '.$data['tahun']['nama'].' belum diatur, mohon mengaturnya terlebih dahulu melalui tautan berikut. 
			<a href="'.base_url('/akademik'.'/'.$data['sekolah'][0]['sch_id'].'/kategori-penilaian-detail'.'/'.$data['tahun']['id']).'" target="_blank"><b>Atur Rumus</b></a>';
		}
		?>
	</p>
	<div class="col-sm-12 mb-20 pd-0">
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-upload-nilai-part2') ?>" method="POST">
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<?php
						$no = 1;
						foreach ($data['subject'] as $key => $value) { ?>
							<tr>
								<td scope="row" style="width: 10px;"><?= $no ?></td>
								<td scope="row"> <?= $value['val_subject'] ?></td>
								<td>
									<select class="custom-select col-12 fh-35" name='variable[<?= $value['val_subject'] ?>]' id='variable'>
										<option value="<?= False ?>">Pilih variabel...</option>
										<?php
										foreach ($data['variable'] as $e => $val) { ?>
											<option value="<?= $val['var_code'] ?>">($<?= $val['var_code'] ?>) - <?= $val['var_name'] ?></option>
										<?php }
										?>
									</select>
								</td>
							</tr>
						<?php
							$no++;
						} ?>
					</tbody>
				</table>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
			</div>
		</form>
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