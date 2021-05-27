<li>
	<a href="<?=base_url("beranda")?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'beranda') {echo 'active';}?>">
		<span class="micon dw dw-house1"></span><span class="mtext">Beranda</span>
	</a>
</li>

<li>
	<a href="<?=base_url('pusat-data')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'pusat-data') {echo 'active';}?>">
		<span class="micon dw dw-server"></span><span class="mtext">Pusat Data</span>
	</a>
</li>

<li>
	<a href="<?=base_url('akademik')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'akademik') {echo 'active';}?>">
		<span class="micon dw dw-book"></span><span class="mtext">Akademik</span>
	</a>
</li>

<li>
	<a href="<?=base_url('rapor-siswa')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'rapor-siswa') {echo 'active';}?>">
		<span class="micon dw dw-certificate"></span><span class="mtext">Rapor Siswa</span>
	</a>
</li>

<li>
	<a href="<?=base_url('pengguna')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'pengguna') {echo 'active';}?>">
		<span class="micon dw dw-support-1"></span><span class="mtext">Pengguna</span>
	</a>
</li>

<li>
	<a href="<?=base_url('konfigurasi')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'konfigurasi') {echo 'active';}?>">
		<span class="micon dw dw-settings1"></span><span class="mtext">Konfigurasi</span>
	</a>
</li>