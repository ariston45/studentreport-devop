<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$data['school'][0]['sch_name']?></h4>
	<p class="mb-20">Manage the customer</p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<table class="data-table table stripe hover nowrap" id="dt">
		<thead>
			<tr>
				<th class="table-plus">No</th>
				<th>ID Siswa</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th class="datatable-nosort">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		foreach ($data['student'] as $key => $value) { ?>
			<tr>
				<td class="table-plus"><?=$no?></td>
				<td><?= $value['stu_id'] ?></td>
				<td><?= $value['stu_name'] ?></td>
				<td><?= $value['stu_email'] ?></td>
				<td><?= $value['stu_class'][0]['cls_name'] ?></td>
				<td><?= $value['stu_major'][0]['mj_name'] ?></td>
				<td>
					<div class="dropdown">
						<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<i class="dw dw-more"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="<?=base_url()?>"><i class="dw dw-eye"></i> View</a>
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