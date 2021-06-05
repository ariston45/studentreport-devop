<div class="row" >
	<div class="col-sm-12 mb-10">
		<div class="btn-group">
			
			<!-- # -->
			<div class="btn-group dropdown">
				<button type="button" 
				<?php
					if ($segments[3] == 'siswa') {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}
				?> 
				data-toggle="dropdown" aria-expanded="false"> Rapor Siswa <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/siswa')?>">Cari Siswa</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-data-siswa')?>">Cari Berdasarkan Kelas dan Jurusan</a>
				</div>
			</div>
			<!-- # -->
			<div class="btn-group dropdown">
				<button type="button"
				<?php
					if ($segments[3] == 'guru') {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}
				?>  
				data-toggle="dropdown" aria-expanded="false"> Kenaikan Kelas <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/guru')?>">Audit Data Nilai</a>
				</div>
			</div>
			<!-- # -->
			<!-- # -->
			<div class="btn-group dropdown">
				<button type="button" 
				<?php
					if ($segments[3] == 'kelas-jurusan') {                          
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}
				?>
				data-toggle="dropdown" aria-expanded="false"> Peringkat <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/kelas')?>">Peringkat Kelas</a>
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/tambah-kelas')?>">Peringkat Umum</a>
				</div>
			</div>
			<!-- # -->
			<!-- # -->
		</div>
	</div>		
</div>