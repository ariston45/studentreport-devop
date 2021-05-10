<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$data['subpagetitle']?></h4>
	<p class="mb-20">Manage the customer</p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<dl class="row mb-0" style="font-size: 14px;">
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<dt class="col-sm-4">Customer Name</dt>
				<dd class="col-sm-8 mb-0"><?=$data['subpagetitle']?></dd>
				<?php
				foreach ($data['user'] as $key => $value) { ?>
					<dt class="col-sm-4"><?=$key?></dt>
					<dd class="col-sm-8 mb-0"><?=$value?></dd>
					<?php
				}
				?>
			</dl>
		</dd>	
		<dd class="col-sm-6 mb-0">
			<dl class="row mb-0">
				<?php
				foreach ($data['meta'] as $key => $value) { ?>
					<dt class="col-sm-4"><?=$key?></dt>
					<dd class="col-sm-8 mb-0"><?=$value?></dd>
				<?php
				}
				?>
			</dl>
		</dd>
	</dl>
	<hr>	
</div>