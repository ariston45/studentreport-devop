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
$routes->get('exp', 'Home::exp');
$routes->get('home', 'General\Mainpage::index');

$routes->get('logout', 'General\Authentification::Logout');


$routes->group('exams', function($routes)
{
	$routes->get('/', 'Examanager\Exacreator::index');
  $routes->get('create-schedules', 'Examanager\Exacreator::index');
	$routes->group('create-schedules', function($routes)
	{
		$routes->add('form-schedule/(:any)', 'Examanager\Exacreator::Formschedule/$1');
	});
	$routes->get('exam-on-campus', 'Examanager\Exaoncampus::index');
	$routes->get('exam-on-home', 'Examanager\Exaonhome::index');
	$routes->get('get-report', 'Examanager\Exacreator::index');
});

$routes->group('customers', function($routes)
{
	$routes->get('/', 'Customers\Customers::index');
	$routes->get('(:any)/overview', 'Customers\Customers::CustomerOverview');
	$routes->get('(:any)/students', 'Customers\Customers::CustomerStudent/$1');
	$routes->get('(:any)/user-manager', 'Customers\Customers::CustomerUsrMgnt/$1');
});

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::Loginpage');
$routes->add('auth', 'Auth::index');
$routes->get('beranda', 'Beranda::index');
$routes->group('pusat-data', function($routes){
	$routes->get('/', 'PusatData::index');
	$routes->get('(:any)/profil-sekolah', 'PusatData::ProfilSekolah/$1');
	$routes->get('(:any)/siswa', 'PusatData::Siswa/$1');
	$routes->get('(:any)/tambah-data-siswa', 'PusatData::TambahSiswa/$1');
	$routes->get('(:any)/guru', 'PusatData::Guru/$1');
	$routes->get('(:any)/guru/(:num)', 'PusatData::GuruDetail/$1/$2');
	$routes->get('(:any)/tambah-data-guru', 'PusatData::TambahGuru');
	$routes->get('(:any)/wali-murid', 'PusatData::WaliMurid');
	$routes->get('(:any)/kelas-jurusan', 'PusatData::Kelas');
	$routes->get('(:any)/user-admin', 'PusatData::UserAdmin');
	$routes->add('(:any)/eksekusi-tambah-data-siswa', 'PusatData::EksekusiTambahSiswa/$1');
});

$routes->get('get-json-kelas', 'PusatData::Kelas_json');

$routes->get('akademik', 'General\Mainpage::index');
$routes->get('rapor-siswa', 'General\Mainpage::index');
$routes->get('pengguna', 'General\Mainpage::index');
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