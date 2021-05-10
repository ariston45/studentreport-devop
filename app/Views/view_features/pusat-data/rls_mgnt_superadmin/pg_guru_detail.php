<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$content['pg_title']?></h4>
	<p  style="font-size: 14px;" class="mb-20"><?=$content['pg_subtitle']?></p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 14px;">
		Berikut profil guru dari sekolah <?=$content['pg_title']?>.
	</p>
	<dl class="row mb-0" style="font-size: 14px;">
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<dt class="col-sm-4">Nama Guru</dt>
				<dd class="col-sm-8 mb-0"><?=$data['guru'][0]['u_name']?></dd>
				<dt class="col-sm-4">Alamat</dt>
				<dd class="col-sm-8 mb-0"><?=$data['guru'][0]['u_address']?></dd>
				<dt class="col-sm-4">Alamat Email</dt>
				<dd class="col-sm-8 mb-0"><?=$data['guru'][0]['u_email']?></dd>
				<dt class="col-sm-4">Telepon</dt>
				<dd class="col-sm-8 mb-0"><?=$data['guru'][0]['u_phone']?></dd>
			</dl>
		</dd>
	</dl>
	<hr>
	<p>Mata Pelajaran</p>
	
</div>