<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<hr>
	<p style="font-size: 14px;">
		Berikut ini adalah tabel rumus penilaian dari kategori penilaian (Tengah Semester Satu, Semester Satu, Tengah Semester Dua, Semester Dua). 
		Untuk membuat rumus penilaian dari masing-masing kategori penilain, silakan klik tombol "Set Rumus" pada kolom Opsi.
	</p>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="2">Kategori Penilaian <?= $data['nmaktif'] ?></th>
					<th>Rumus</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['kategori'] as $key => $value) { ?>
					<tr>
						<td style="width: 5px;"><?= $no ?></td>
						<td scope="row"><?= $value['cat_category_name'] ?></td>
						<td scope="row"><?= $value['cat_formula_asses'] ?></td>
						<td>
							<a href="<?=base_url($content['pg_menu_url'].'/membuat-rumus'.'/'.$value['cat_id'])?>">
								<span class="badge badge-secondary">Set Rumus</span>
							</a>
						</td>
					</tr>
				<?php $no++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>