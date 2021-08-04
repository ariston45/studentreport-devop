<div class="row" >
	<div class="col-sm-12 mb-10">
		<div class="btn-group">
			<div class="btn-group dropdown">
				<button type="button" 
				<?php
					if ($segments[3] == 'profil-sekolah') {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect"';
					}
				?> 
				data-toggle="dropdown" aria-expanded="false"> Tahun Akademik <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tahun-akademik')?>">Tahun Akademik</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-tahun-akademik')?>">Tambah Tahun Akademik</a>
				</div>
			</div>
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
				data-toggle="dropdown" aria-expanded="false"> Penilaian <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/unggah-nilai')?>">Unggah Nilai Dari Excel</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-nilai-manual')?>">Tambah Nilai Manual</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/perbarui-nilai')?>">Perbarui Data Nilai</a>
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
				data-toggle="dropdown" aria-expanded="false">Pengaturan Penilaian<span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/kategori-penilaian')?>">Konfigurasi Kategori Evaluasi</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/variable-penilaian')?>">Konfigurasi Variabel Penilaian</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/variable-penilaian')?>">Konfigurasi Bentuk Penilaian Huruf</a>
				</div>
			</div>
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
				data-toggle="dropdown" aria-expanded="false"> Mata Pelajaran <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/mapel')?>">Data Mata Pelajaran</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/kelompok-mapel')?>">Data Kelompok Mata Pelajaran</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-mapel')?>">Tambah Mata Pelajaran</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-kelompok-mapel')?>">Tambah Kelompok Mata Pelajaran</a>
				</div>
			</div>
			<!-- # -->
			
			
			<!-- # -->
			
			<!-- # -->
		
			<!-- # -->
		</div>
	</div>		
</div>