<div class="row" >
	<div class="col-sm-12 mb-10">
		<div class="btn-group">
			<a href="<?=base_url($content['pg_menu_url'].'/tahun-akademik')?>" type="button"
				<?php
					if ($segments[3] == 'profil-sekolah') {
						echo 'class="btn btn-outline-primary btn-sm"';
					}else {
						echo 'class="btn btn-outline-primary btn-sm"';
					}
				?>>
					Tahun Akademik
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
				data-toggle="dropdown" aria-expanded="false"> Penilaian <span class="caret"></span> </button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/upload-nilai')?>">Upload Nilai</a>
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
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/rumus-penilaian')?>">Rumus Penilaian</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/kategori-penilaian')?>">Kategori Penilaian</a>
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/variable-penilaian')?>">Variabel Penilaian</a>
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
					<a class="dropdown-item" href="<?=base_url($content['pg_menu_url'].'/tambah-mapel')?>">Tambah Mata Pelajaran</a>
				</div>
			</div>
			<!-- # -->
			
			
			<!-- # -->
			
			<!-- # -->
		
			<!-- # -->
		</div>
	</div>		
</div>