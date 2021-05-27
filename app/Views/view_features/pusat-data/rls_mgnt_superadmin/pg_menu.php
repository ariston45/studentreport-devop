<div class="row" >
	<div class="col-sm-12 mb-10">
		<div class="btn-group">
			<a href="<?=base_url($content['pg_menu_url'].'/profil-sekolah')?>" type="button"
				<?php
					if ($segments[3] == 'profil-sekolah') {
						echo 'class="btn btn-outline-primary btn-sm"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm"';
					}
				?>>
					Profil Sekolah
			</a>
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
				data-toggle="dropdown" aria-expanded="false"> Siswa <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/siswa')?>">Data Siswa</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-data-siswa')?>">Tambah Data Siswa</a>
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
				data-toggle="dropdown" aria-expanded="false"> Guru <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/guru')?>">Data Guru</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-data-guru')?>">Tambah Data Guru</a>
				</div>
			</div>
			<!-- # -->
			<a href="<?=base_url($content['pg_menu_url'].'/wali-murid')?>" type="button" 
					<?php
						if ($segments[3] == 'wali-murid') {
							echo 'class="btn btn-outline-primary btn-sm"';
						}else {
							echo 'class="btn btn-outline-primary btn-sm"';
						}
					?>>
					Wali Murid
			</a>
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
				data-toggle="dropdown" aria-expanded="false"> Kelas & Jurusan <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/kelas')?>">Data Kelas</a>
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/tambah-kelas')?>">Tambah Data Kelas</a>
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/tambah-jurusan')?>">Tambah Data Jurusan</a>
				</div>
			</div>
			<!-- # -->
			<div class="btn-group dropdown">
				<button type="button" 
				<?php
					if ($segments[3] == 'user-admin') {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}
				?>
				data-toggle="dropdown" aria-expanded="false"> User Admin <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/user-admin')?>">Data User</a>
					<a class="dropdown-item" href="<?= base_url($content['pg_menu_url'].'/tambah-data-admin')?>">Tambah Data User</a>
				</div>
			</div>
			<!-- # -->
		</div>
	</div>		
</div>