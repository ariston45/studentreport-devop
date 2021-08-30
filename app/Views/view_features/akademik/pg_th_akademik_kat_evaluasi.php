<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Akademik - <?=$content['pg_title']?></h6>
	<p  style="font-size: 14px;" class="mb-20"><?=$content['pg_subtitle']?></p>
	<hr>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Kategori Evaluasi Penilaian</b><br>
		Berikut ini merupakan data tahun ajaran, pada masing-masing tahun ajaran terdapat data kategori evaluasi penilaian. 
		Untuk melihat evaluasi-evaluasi tahun ajaran silakan klik menu dropdown pada kolom Opsi. 
	</p>
	<hr>
	<table class="data-table table stripe hover nowrap" id="dt">
		<thead>
			<tr>
				<th class="table-plus" style="width: 10px;">No</th>
				<th>Tahun Akademik</th>
				<th class="datatable-nosort" style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$no = 1;
		foreach ($data['akademik'] as $key => $value) { ?>
			<tr>
				<td class="table-plus"><?=$no?></td>
				<td>Kategori Evaluasi <?= $value['ach_years'] ?></td>
				<td  style="text-align: center;">
					<div class="dropdown">
						<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<i class="dw dw-more"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/kategori-penilaian-detail'.'/'.$value['aca_id']) ?>"><i class="icon-copy dw dw-eye"></i> Lihat</a>
						</div>
					</div>
				</td>
			</tr>
		<?php $no++; } ?>
		</tbody>
	</table>	
</div>