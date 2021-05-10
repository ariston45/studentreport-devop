<div class="row" >
	<div class="col-sm-12 mb-20">
		<a href="<?=base_url($data['url'].'/overview')?>">
		<button type="button" 
		class="<?php
		if ($segments[3] == 'overview') {
			echo 'btn btn-primary btn-sm';
		}else {
			echo 'btn btn-link btn-sm';
		}
		?>"><i class="icon-copy dw dw-analytics-5" style="padding-right: 4px;"></i>Overview
		</button></a>
		<a href="<?=base_url($data['url'].'/students')?>">
		<button type="button" class="
		<?php
		if ($segments[3] == 'students') {
			echo 'btn btn-primary btn-sm';
		}else {
			echo 'btn btn-link btn-sm';
		}
		?>"><i class="icon-copy dw dw-group" style="padding-right: 4px;"></i>Siswa
		</button></a>
		<a href="<?=base_url($data['url'].'/user-manager')?>">
		<button type="button" class="
		<?php
		if ($segments[3] == 'user-manager') {
			echo 'btn btn-primary btn-sm';
		}else {
			echo 'btn btn-link btn-sm';
		}
		?>"><i class="icon-copy dw dw-user1" style="padding-right: 4px;"></i>Manajemen User
		</button>
		</a>
		<a href="<?=base_url($data['url'].'/get-report')?>">
		<button type="button" class="
		<?php
		if ($segments[3] == 'get-report') {
			echo 'btn btn-primary btn-sm';
		}else {
			echo 'btn btn-link btn-sm';
		}
		?>"><i class="icon-copy dw dw-user1" style="padding-right: 4px;"></i>Laporan
		</button>
		</a>
		<a href="<?=base_url($data['url'].'/option')?>">
		<button type="button" class="
		<?php
		if ($segments[3] == 'option') {
			echo 'btn btn-primary btn-sm';
		}else {
			echo 'btn btn-link btn-sm';
		}
		?>"><i class="icon-copy dw dw-settings" style="padding-right: 4px;"></i>Pengaturan
		</button>
		</a>
	</div>
</div>