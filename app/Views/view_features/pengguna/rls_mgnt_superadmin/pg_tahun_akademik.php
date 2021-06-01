<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$content['pg_title']?></h4>
	<p  style="font-size: 14px;" class="mb-20"><?=$content['pg_subtitle']?></p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<p style="font-size: 14px;">
		Berikut profil dari sekolah <?=$content['pg_title']?>.
	</p>
	<dl class="row mb-0" style="font-size: 14px;">
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<dt class="col-sm-4">Nama Sekolah</dt>
				<dd class="col-sm-8 mb-0"><?=$data['school'][0]['sch_name']?></dd>
				<dt class="col-sm-4">Alamat</dt>
				<dd class="col-sm-8 mb-0"><?=$data['school'][0]['sch_address']?></dd>
				<dt class="col-sm-4">Alamat Email</dt>
				<dd class="col-sm-8 mb-0"><?=$data['school'][0]['sch_email']?></dd>
				<dt class="col-sm-4">Telepon</dt>
				<dd class="col-sm-8 mb-0"><?=$data['school'][0]['sch_phone']?></dd>
				<dt class="col-sm-4">Website</dt>
				<dd class="col-sm-8 mb-0"><?=$data['school'][0]['sch_website']?></dd>
			</dl>
		</dd>	
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<dt class="col-sm-4">Date Joined</dt>
				<dd class="col-sm-8"> </dd>
				<dt class="col-sm-4">Student Amount</dt>
				<dd class="col-sm-8"> </dd>
			</dl>
		</dd>
	</dl>
	<hr>	
</div>