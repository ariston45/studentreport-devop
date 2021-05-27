<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<p style="font-size: 14px;">
		Manajemen data kategori penilaian satu tahun ajaran.
	</p>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="3">Kategori Penilaian <?=$data['nmaktif']?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data['kategori'] as $key => $value) { ?>
					<tr>
						<td style="width: 5px;"><?= $no ?></td>
						<td scope="row"><?= $value['cat_category_name'] ?></td>
						<td>
							<span class="badge badge-secondary">Set Formula Penilaian</span>
							<span class="badge badge-secondary">Upload Nilai</span>
							<span class="badge badge-secondary">Ubah Nama</span> 
						</td>
					</tr>
				<?php $no++;
				}
				?>
			</tbody>
		</table>
	</div>

</div>