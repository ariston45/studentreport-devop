<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// ====================================================================
// default

// Example
$routes->get('/base', 'General\Base::index');
// Developer

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::Loginpage');
$routes->get('logout', 'General\Authentification::Logout');
$routes->add('auth', 'Auth::index');
$routes->get('beranda', 'Beranda::index');
$routes->get('get-json-kelas', 'PusatData::Kelas_json');

$routes->group('pusat-data', function($routes){
	$routes->get('/', 'PusatData::index');
	$routes->get('(:any)/profil-sekolah', 'PusatData::ProfilSekolah/$1');
	$routes->get('(:any)/siswa', 'PusatData::Siswa/$1');
	$routes->get('(:any)/tambah-data-siswa', 'PusatData::TambahSiswa/$1');
	$routes->add('(:any)/eksekusi-tambah-data-siswa', 'PusatData::EksekusiTambahSiswa/$1');
	// 
	$routes->get('(:any)/guru', 'PusatData::Guru/$1');
	$routes->get('(:any)/guru/(:num)', 'PusatData::GuruDetail/$1/$2');
	$routes->get('(:any)/guru/(:num)/tambah-pelajaran', 'PusatData::GuruTambahpelajaran/$1/$2');
	$routes->get('(:any)/tambah-data-guru', 'PusatData::TambahGuru/$1');
	$routes->add('(:any)/eksekusi-tambah-data-guru', 'PusatData::EksekusiTambahGuru/$1');
	$routes->add('(:any)/guru/(:num)/eksekusi-tambah-data-mapel-guru', 'PusatData::EksekusiTambahMapelGuru/$1/$2');
	// 
	$routes->get('(:any)/wali-murid', 'PusatData::WaliMurid/$1');
	$routes->get('(:any)/wali-murid/(:num)/edit', 'PusatData::EditWaliMurid/$1/$2');
	$routes->add('(:any)/wali-murid/(:num)/edit-exe', 'PusatData::AksiEditWaliMurid/$1/$2');
	// 
	$routes->get('(:any)/kelas', 'PusatData::Kelas/$1');
	$routes->get('(:any)/tambah-kelas', 'PusatData::TambahKelas/$1');
	$routes->add('(:any)/eksekusi-tambah-kelas', 'PusatData::EksekusiTambahKelas/$1');
	// 
	$routes->get('(:any)/jurusan', 'PusatData::Jurusan/$1');
	$routes->get('(:any)/tambah-jurusan', 'PusatData::TambahJurusan/$1');
	$routes->add('(:any)/eksekusi-tambah-jurusan', 'PusatData::EksekusiTambahJurusan/$1');
	// 
	$routes->get('(:any)/user-admin', 'PusatData::UserAdmin/$1');
	$routes->get('(:any)/user-admin/(:num)/edit', 'PusatData::EditUserAdmin/$1/$2');
	$routes->add('(:any)/user-admin/(:num)/edit-exe', 'PusatData::AksiEditUserAdmin/$1/$2');
	$routes->get('(:any)/tambah-data-admin', 'PusatData::TambahAdmin/$1');
	$routes->add('(:any)/eksekusi-tambah-admin', 'PusatData::EksekusiTambahAdmin/$1');
	// 
});

$routes->group('akademik', function ($routes) {
	$routes->get('/', 'Akademik::index');
	// 
	$routes->get('(:any)/tahun-akademik', 'Akademik::TahunAkademik/$1');
	$routes->get('(:any)/th-set-active/(:any)', 'Akademik::ThSetAktive/$1/$2');
	$routes->get('(:any)/update-th-akad/(:any)', 'Akademik::UpdateTahunAkad/$1/$2');
	$routes->add('(:any)/eksekusi-update-thakad/(:any)', 'Akademik::EksekusiUpdateThakad/$1/$2');
	// 
	$routes->get('(:any)/kategori-penilaian', 'Akademik::KategoriPenilaian/$1');
	$routes->add('(:any)/eksekusi-tambah-kategori', 'Akademik::EksekusiTambahKategori/$1');
	$routes->add('(:any)/hapus-kategori', 'Akademik::HapusKategori/$1');
	$routes->get('(:any)/update-kategori/(:any)', 'Akademik::UpdateKategori/$1/$2');
	$routes->add('(:any)/eksekusi-update-kategori/(:any)', 'Akademik::EksekusiUpdateKategori/$1/$2');
	//
	$routes->get('(:any)/variable-penilaian', 'Akademik::VariablePenilaian/$1');
	$routes->add('(:any)/eksekusi-tambah-variable', 'Akademik::EksekusiTambahVar/$1');
	$routes->get('(:any)/update-variable/(:any)', 'Akademik::UpdateVariable/$1/$2');
	$routes->add('(:any)/eksekusi-update-variable/(:any)', 'Akademik::EksekusiUpdateVariable/$1/$2');
	//
	$routes->get('(:any)/membuat-rumus/(:num)', 'Akademik::MembuatRumus/$1/$2');
	$routes->get('(:any)/rumus-penilaian', 'Akademik::RumusPenilaian/$1');
	$routes->add('(:any)/eksekusi-rumus', 'Akademik::EksekusiRumus/$1');
	// 
	$routes->get('(:any)/mapel', 'Akademik::MataPelajaran/$1');
	$routes->get('(:any)/tambah-mapel', 'Akademik::TambahMapel/$1');
	$routes->add('(:any)/eksekusi-tambah-pelajaran', 'Akademik::EksekusiTambahMapel/$1');
	$routes->get('(:any)/update-mapel/(:any)', 'Akademik::UpdateMapel/$1/$2');
	$routes->add('(:any)/eksekusi-update-pelajaran/(:any)', 'Akademik::EksekusiUpdateMapel/$1/$2');
	// 
	$routes->get('(:any)/unggah-nilai', 'Akademik::UploadNilai/$1');
	$routes->add('(:any)/eksekusi-upload-nilai-part1', 'Akademik::EksekusiUploadNilai_part1/$1');
	$routes->add('(:any)/eksekusi-upload-nilai-part2', 'Akademik::EksekusiUploadNilai_part2/$1');
	$routes->get('(:any)/tambah-nilai-manual', 'Akademik::TambahNilaiManual/$1');
	$routes->add('(:any)/eksekusi-nilai-manual', 'Akademik::EksekusiNilaiManual/$1');
	$routes->get('(:any)/perbarui-nilai', 'Akademik::PerbaruiNilai/$1');
	$routes->add('(:any)/eksekusi-perbarui-nilai', 'Akademik::EksekusiPerbaruiNilai/$1');
	$routes->get('(:any)/form-perbarui-nilai/(:any)', 'Akademik::FormPerbaruiNilai/$1/$2');
	$routes->add('(:any)/eksekusi-form-perbarui-nilai/(:any)', 'Akademik::EksekusiFormPerbaruiNilai/$1/$2');
	$routes->get('(:any)/clear-datafilter', 'Akademik::ClearDataFilter/$1');
}); 
//
$routes->group('rapor-siswa', function ($routes) {
	$routes->get('/', 'RaporSiswa::index');
	$routes->get('(:any)/cari-rapor-siswa', 'RaporSiswa::CariRapor/$1');
	$routes->get('audit-kenaikan-kelas', 'RaporSiswa::index');
	$routes->get('peringkatisasi-siswa', 'RaporSiswa::index');
});
// 
$routes->group('pengguna', function ($routes) {
	$routes->get('/', 'Pengguna_ctrl::index');
	$routes->get('tambah-pengguna', 'Pengguna_ctrl::TambahUserMgnt');
	$routes->add('eksekusi-tambah-pengguna', 'Pengguna_ctrl::EksekusiTambahUserMgnt');
	$routes->get('update-pengguna/(:any)', 'Pengguna_ctrl::UpdateUserMgnt/$1');
	$routes->add('eksekusi-update-pengguna/(:any)', 'Pengguna_ctrl::EksekusiUpdateUserMgnt/$1');
});
// 
$routes->get('konfigurasi', 'General\Mainpage::index');

// ====================================================================

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
