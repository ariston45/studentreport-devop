
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4"></h4>
		<p class="mb-0">Chose customer data</p>
	</div>
	<div class="pb-20">
		<table class="data-table table stripe hover nowrap" id="dt">
			<thead>
				<tr>
					<th class="table-plus">No</th>
					<th>Nama Sekolah</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($data as $key => $value) { ?>
				<tr>
					<td class="table-plus"><?= $no ?></td>
					<td><?= $value['sch_name'] ?></td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="<?=base_url('akademik/'.strtolower($value['sch_id']).'/tahun-akademik')?>"><i class="dw dw-eye"></i> View</a>
							</div>
						</div>
					</td>
				</tr>
			<?php $no++; } ?>
			</tbody>
		</table>
	</div>
</div>