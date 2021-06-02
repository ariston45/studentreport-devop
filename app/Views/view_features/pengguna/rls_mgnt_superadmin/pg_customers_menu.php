<div class="row" >
	<div class="col-sm-12 mb-20">
	<div class="btn-group">
		<button type="button"
			<?php
				if ($segments[3] == 'profil-sekolah') {
					echo 'class="btn btn-primary btn-sm"';
				}else {
					echo 'class="btn btn-light btn-sm"';
				}
			?>>
			Profil Sekolah
		</button>
		<!-- # -->
		<div class="btn-group dropdown">
			<button type="button" 
			<?php
				if ($segments[3] == 'siswa') {
					echo 'class="btn btn-primary btn-sm dropdown-toggle waves-effect"';
				}else {
					echo 'class="btn btn-light btn-sm dropdown-toggle waves-effect"';
				}
			?> 
			data-toggle="dropdown" aria-expanded="false"> Siswa <span class="caret"></span> </button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Data Siswa</a>
				<a class="dropdown-item" href="#">Tambah Data Siswa</a>
			</div>
		</div>
		<!-- # -->
		<div class="btn-group dropdown">
			<button type="button"
			<?php
				if ($segments[3] == 'guru') {
					echo 'class="btn btn-primary btn-sm dropdown-toggle waves-effect"';
				}else {
					echo 'class="btn btn-light btn-sm dropdown-toggle waves-effect"';
				}
			?>  
			data-toggle="dropdown" aria-expanded="false"> Guru <span class="caret"></span> </button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Data Guru</a>
				<a class="dropdown-item" href="#">Tambah Data Guru</a>
			</div>
		</div>
		<!-- # -->
		<button type="button" 
			<?php
				if ($segments[3] == 'wali-murid') {
					echo 'class="btn btn-primary btn-sm"';
				}else {
					echo 'class="btn btn-light btn-sm"';
				}
			?>>
			Wali Murid
		</button>
		<!-- # -->
		<div class="btn-group dropdown">
			<button type="button" 
			<?php
				if ($segments[3] == 'kelas-jurusan') {
					echo 'class="btn btn-primary btn-sm dropdown-toggle waves-effect"';
				}else {
					echo 'class="btn btn-light btn-sm dropdown-toggle waves-effect"';
				}
			?>
			data-toggle="dropdown" aria-expanded="false"> Kelas & Jurusan <span class="caret"></span> </button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Data Kelas</a>
				<a class="dropdown-item" href="#">Tambah Data Kelas</a>
				<a class="dropdown-item" href="#">Tambah Data Jurusan</a>
			</div>
		</div>
		<!-- # -->
		<div class="btn-group dropdown">
			<button type="button" 
			<?php
				if ($segments[3] == 'user-admin') {
					echo 'class="btn btn-primary btn-sm dropdown-toggle waves-effect"';
				}else {
					echo 'class="btn btn-light btn-sm dropdown-toggle waves-effect"';
				}
			?>
			data-toggle="dropdown" aria-expanded="false"> User Admin <span class="caret"></span> </button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Data User</a>
				<a class="dropdown-item" href="#">Tambah Data User</a>
			</div>
		</div>
		<!-- # -->
</div>