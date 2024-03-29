<style>
	.badge {
		padding: 0.50em;
	}
</style>
<style>
  .table thead th {
    padding-top: 2px;
    padding-bottom: 2px;
  }

  .table-responsive {
    margin-top: 20px;
  }
  p {
    font-size: 13px;
  }
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<!-- # -->
	<h6>Pusat Data - <?=$content['pg_title']?></h6>
	<p style="font-size: 13px;" class="mb-15"><?=$content['pg_subtitle']?></p>
	<hr>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 13px;">
		<b>Tambah Data Jurusan</b><br>
		Tambahkan data jurusan.
	</p>
	<hr>
	<!-- # -->
	<div class="mb-20">
		<form action="<?= base_url($content['pg_menu_url'].'/eksekusi-tambah-jurusan')?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label">Nama Jurusan</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" name="nama" class="form-control col-12 fh-35" placeholder="Nama Jurusan ..">
				</div>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</div>
		</form>
	</div>
	<hr>
	<p style="font-size: 13px;">
		<b>Data Jurusan</b><br>
	</p>
	<table class="table table-striped" id="dt" style="width:45%">
		<thead>
			<tr>
				<th class="table-plus" style="width:10px">No</th>
				<th>Jurusan</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		foreach ($data['jurusan'] as $key => $value) { ?>
			<tr>
				<td class="table-plus"><?=$no?></td>
				<td><?= $value['mo_name'] ?></td>
			</tr>
		<?php $no++; } ?>
		</tbody>
	</table>	
	<?php if (!empty(session()->getFlashdata('notif_email_error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Kesalahan email.</b>
			<hr>
			<?php echo session()->getFlashdata('notif_email_error');?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-danger" role="alert">
			<b>Gagal.</b>
			<hr>
			<?php echo session()->getFlashdata('error');?>
		</div>
	<?php endif; ?>
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
		<div class="alert alert-success" role="alert">
			<b>Berhasil.</b>
			<hr>
			<?php echo session()->getFlashdata('success');?>
		</div>
	<?php endif; ?>
</div>