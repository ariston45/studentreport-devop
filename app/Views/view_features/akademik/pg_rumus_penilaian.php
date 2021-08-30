<style>
	.tb-info {
		color: white;
	}

	.tb-info td,
	.tb-info th {
		border-top: 0px;
	}

	.tb-info td {
		vertical-align: top;
	}

	.btn-custom {
		font-size: 12px;
		height: 30px;
		padding-top: 0px;
		padding-bottom: 0px;
	}
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h6>Akademik - <?= $content['pg_title'] ?></h6>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<hr>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Set Rumus</b><br>
		Untuk menghasilkan nilai akhir dari setiap evaluasi, nilai-nilai dari penugasan ataupun quiz (ulangan harian) dapat di proses menggunakan rumus. 
		Rumus dapat berbeda dari masing-masing evaluasi.
	</p>
	<hr>
	<div class="row clearfix">
		<div class="col-sm-6">
			<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-rumus'.'/'.$data['kategori'][0]['cat_acad_id']) ?>" method="post" enctype="multipart/form-data">
				<input name="idcat" type="hidden" value="<?= $data['idcat'] ?>">
				<div class="text-right">
					<a href="<?= base_url($content['pg_menu_url'] . '/kategori-penilaian-detail'.'/'.$data['kategori'][0]['cat_acad_id']) ?>">
						<button type="button" class="btn btn-sm btn-outline-secondary"><i class="icon-copy dw dw-cancel"></i> Kembali</button>
					</a>
					<button type="submit" class="btn btn-sm btn-primary"><i class="icon-copy dw dw-diskette1"></i> Simpan</button>
				</div>
				<div class="form-group">
					<label for="">Perbarui Rumus Penilaian</label><br>
					<input name="rumus" id="display1" class="form-control col-12 fh-35" type="text" readonly>
				</div>
			</form>
			<button id="zero" class="btn btn-sm btn-primary mb-20">0</button>
			<button id="one" class="btn btn-sm btn-primary mb-20">1</button>
			<button id="two" class="btn btn-sm btn-primary mb-20">2</button>
			<button id="three" class="btn btn-sm btn-primary mb-20">3</button>
			<button id="four" class="btn btn-sm btn-primary mb-20">4</button>
			<button id="five" class="btn btn-sm btn-primary mb-20">5</button>
			<button id="six" class="btn btn-sm btn-primary mb-20">6</button>
			<button id="seven" class="btn btn-sm btn-primary mb-20">7</button>
			<button id="eight" class="btn btn-sm btn-primary mb-20">8</button>
			<button id="nine" class="btn btn-sm btn-primary mb-20">9</button>
			<button id="add" class="btn btn-sm btn-primary mb-20">+</button>
			<button id="subtract" class="btn btn-sm btn-primary mb-20">-</button>
			<button id="divide" class="btn btn-sm btn-primary mb-20">/</button>
			<button id="multiply" class="btn btn-sm btn-primary mb-20">*</button>
			<button id="left-parenthesis" class="btn btn-sm btn-primary mb-20">(</button>
			<button id="right-parenthesis" class="btn btn-sm btn-primary mb-20">)</button>
			<button id="clear" class="btn btn-sm btn-primary mb-20"><i class="icon-copy dw dw-delete-3"></i> Clear</button>
			<button id="backspace" class="btn btn-sm btn-primary mb-20"> <i class="icon-copy dw dw-delete-1"></i> Deletion</button>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Kode Variabel</th>
							<th scope="col">Nama Variabel</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data['variable'] as $key => $value) { ?>
							<tr>
								<td scope="row"><?= $no ?></td>
								<td> <button id="<?= $value['var_code'] ?>" class="btn btn-sm btn-primary btn-custom">$<?= $value['var_code'] ?></button></td>
								<td><?= $value['var_name'] ?></td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card text-white bg-secondary card-box mb-20">
				<div class="card-header">Rumus Penilaian Kategori <?= $data['kategori'][0]['cat_category_name'] ?></div>
				<div class="card-body f-35">
					<p style="font-size: 13px;"><?= $data['kategori'][0]['cat_formula_asses'] ?></p>
				</div>
			</div>
			<div class="card text-white bg-dark card-box mb-20">
				<div class="card-header">Intruksi penginputan rumus penilaian</div>
				<div class="card-body">
					<table class="table tb-info">
						<tr style="width: 25px;">
							<td>1.</td>
							<td>Untuk menginputkan angka, klik tombol angka disamping.</td>
						</tr>
						<tr>
							<td>2.</td>
							<td>
								Anda dapat menggunakan operator aritmatika untuk melakukan penjumalahan, pengurangan, pembagian, maupun perkalian. <br>
								(-) Pengurangan <br>
								(+) Penjumlahan <br>
								(/) Pembagian <br>
								(*) Perkalian <br>
							</td>
						</tr>
						<tr>
							<td>3.</td>
							<td>Untuk mengelompokkan operasi matematika anda dapat mengunakan simbol "()".</td>
						</tr>
						<tr>
							<td>4.</td>
							<td>Tombol "Clear" di gunakan untuk membersihkan inputan atau menghapus semua inputan. Sedangkan tombol "Deletion" digunakan untuk menghapus karakter dari kanan ke kiri.</td>
						</tr>
						<tr>
							<td>5.</td>
							<td>Untuk menginputkan variabel penilaian silakan klik kode variabel dalam tabel kolom kode variabel. Apabila terjadi kekeliruan pada waktu input kode variabel anda dapat menghapusnya menggunakan tombol "Deletion", mohon dipastikan kode yang salah dinput dihapus secara lengkap agar tidak terjadi error.</td>
						</tr>
						<tr>
							<td>6.</td>
							<td>Berikut ini contoh rumus : <br> <b>($var1+$var2+$var3)/3</b> </td>
						</tr>
					</table>
					</li>
				</div>
			</div>
		</div>
	</div>
</div>