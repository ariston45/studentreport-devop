<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Pusat Data - <?=$content['pg_title']?></h6>
	<p style="font-size: 13px;" class="mb-15"><?=$content['pg_subtitle']?></p>
	<hr>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Siswa</b><br>
		Manajemen data siswa.
	</p>
	<!-- <hr> -->
	<!-- # -->
	<table class="data-table table stripe hover nowrap" id="dt">
		<thead>
			<tr>
				<th class="table-plus">No</th>
				<th>ID Siswa</th>
				<th>Nama Siswa</th>
				<th>Email Siswa</th>
				<th>Nama Wali Siswa</th>
				<th>Email Wali Siswa</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th class="datatable-nosort">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		foreach ($data['siswa'] as $key => $value) { ?>
			<tr>
				<td class="table-plus"><?=$no?></td>
				<td><?= $value['stu_id'] ?></td>
				<td><?= $value['stu_fullname'] ?></td>
				<td><?= $value['stu_email'] ?></td>
				<td><?= $value['u_name'] ?></td>
				<td><?= $value['u_email'] ?></td>
				<td><?= $value['cls_name'] ?></td>
				<td><?= $value['mo_name'] ?></td>
				<td>
					<div class="dropdown">
						<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<i class="dw dw-more"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="<?=base_url()?>"><i class="dw dw-eye"></i> View</a>
							<a class="dropdown-item" href="<?=base_url()?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
							<!-- <a class="dropdown-item" href="#"><i class="icon-copy dw dw-delete-3"></i> Delete</a> -->
						</div>
					</div>
				</td>
			</tr>
		<?php $no++; } ?>
		</tbody>
	</table>	
</div>