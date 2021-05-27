<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$content['pg_title']?></h4>
	<p  style="font-size: 14px;" class="mb-20"><?=$content['pg_subtitle']?></p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 14px;">
		Manajemen data Kelas.
	</p>
	<table class="data-table table stripe hover nowrap" id="dt">
		<thead>
			<tr>
				<th class="table-plus">No</th>
				<th>Tahun Akademik</th>
				<th>Status</th>
				<th class="datatable-nosort">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$no = 1;
		foreach ($data['akademik'] as $key => $value) { ?>
			<tr>
				<td class="table-plus"><?=$no?></td>
				<td><?= $value['ach_years'] ?></td>
				<td><?= $value['ach_status'] ?></td>
				<td>
					<div class="dropdown">
						<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<i class="dw dw-more"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
              <?php
              if ($value['ach_status'] == 'AKTIF') {
                echo '<a class="dropdown-item" href="#"><i class="dw dw-flag2"></i>#</a>';
              }else {
                echo '<a class="dropdown-item" href="'.base_url($content['pg_menu_url'].'/'.'th-set-active/'.$value['aca_id']).'"><i class="dw dw-flag2"></i> Aktif</a>';
              }
              ?>
							<a class="dropdown-item" href="<?=base_url()?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
							<a class="dropdown-item" href="#"><i class="icon-copy dw dw-delete-3"></i> Delete</a>
						</div>
					</div>
				</td>
			</tr>
		<?php $no++; } ?>
		</tbody>
	</table>	
</div>