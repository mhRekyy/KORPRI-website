<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('pdf/(:any)', 'Files::show/$1');

$routes->get('/', 'Home::index');

$routes->get('kontak-kami', 'Pages::kontakKami');
$routes->post('kontak-kami/kirim', 'Pages::kirimKontak');
$routes->get('test-email', 'Pages::testEmail');


// $routes->get('profil-korpri', 'Pages::profilKorpri');
$routes->get('profile', 'Pages::Profile');
$routes->get('struktur', 'Pages::Struktur');
$routes->get('sejarah', 'Pages::Sejarah');
$routes->get('tujuan_fungsi', 'Pages::TujuanFungsi');
$routes->get('visi-misi', 'Pages::visiMisi');
$routes->get('Program', 'Pages::Program');
$routes->get('kepengurusan', 'Pages::Kepengurusan');
$routes->get('KetuaUmum', 'Pages::KetuaUmum');
$routes->get('Sekjen', 'Pages::Sekjen');

$routes->get('testGaleri', 'Pages::testGaleri');

$routes->get('galeri', 'Pages::Galeri');
$routes->get('galeri_video', 'Pages::galeri_video');
// $routes->get('berita', 'Pages::Berita');
$routes->get('peraturan', 'Pages::peraturan');
$routes->get('Keputusan', 'Pages::Keputusan');
$routes->get('suratedaran', 'Pages::suratedaran');
$routes->get('artikel', 'Pages::artikel');
$routes->get('artikel/(:segment)', 'Pages::ArtikelDetail/$1');

$routes->get('pengumuman', 'Pages::pengumuman');
// $routes->get('test-berita', 'Pages::testBerita');
$routes->get('berita', 'Pages::Berita');
$routes->get('berita/(:num)', 'Pages::detailBerita/$1');




// Admin Routes
$routes->group('admin', function($routes) {

    $routes->get('/', 'Admin\Dashboard::index');

    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/create', 'Admin\Berita::create');
    $routes->post('berita/store', 'Admin\Berita::store');
    $routes->get('berita/edit/(:num)', 'Admin\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');
    $routes->post('berita/delete/(:num)', 'Admin\Berita::delete/$1');
    $routes->post('berita/toggle/(:num)', 'Admin\Berita::toggle/$1');



});

// ===============================
// ADMIN PERATURAN
// ===============================
$routes->get('admin/peraturan', 'Admin\Peraturan::index');

$routes->get('admin/peraturan/create', 'Admin\Peraturan::create');
$routes->post('admin/peraturan/store', 'Admin\Peraturan::store');

$routes->get('admin/peraturan/edit/(:num)', 'Admin\Peraturan::edit/$1');
$routes->post('admin/peraturan/update/(:num)', 'Admin\Peraturan::update/$1');

$routes->get('admin/peraturan/delete/(:num)', 'Admin\Peraturan::delete/$1');

$routes->get('admin/peraturan/toggle/(:num)', 'Admin\Peraturan::toggle/$1');
// ADMIN ARTIKEL
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('artikel', 'Artikel::index');
    $routes->get('artikel/create', 'Artikel::create');
    $routes->post('artikel/store', 'Artikel::store');
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->post('artikel/update/(:num)', 'Artikel::update/$1');
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');
    $routes->get('artikel/toggle/(:num)', 'Artikel::toggle/$1');
});



// ===============================
// ADMIN KEPUTUSAN
// ===============================
$routes->get('admin/keputusan', 'Admin\Keputusan::index');
$routes->get('admin/keputusan/create', 'Admin\Keputusan::create');
$routes->post('admin/keputusan/store', 'Admin\Keputusan::store');
$routes->get('admin/keputusan/edit/(:num)', 'Admin\Keputusan::edit/$1');
$routes->post('admin/keputusan/update/(:num)', 'Admin\Keputusan::update/$1');
$routes->get('admin/keputusan/delete/(:num)', 'Admin\Keputusan::delete/$1');
$routes->get('admin/keputusan/toggle/(:num)', 'Admin\Keputusan::toggle/$1');


// ===============================
<<<<<<< HEAD
// ADMIN Pengumuman
// ===============================
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('pengumuman', 'Pengumuman::index');
    $routes->get('pengumuman/create', 'Pengumuman::create');
    $routes->post('pengumuman/store', 'Pengumuman::store');
    $routes->get('pengumuman/edit/(:num)', 'Pengumuman::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'Pengumuman::update/$1');
    $routes->get('pengumuman/delete/(:num)', 'Pengumuman::delete/$1');
    $routes->get('pengumuman/toggle/(:num)', 'Pengumuman::toggle/$1');
});
=======
// ADMIN - SURAT EDARAN
// ===============================
$routes->get('admin/surat-edaran', 'Admin\SuratEdaran::index');
$routes->get('admin/surat-edaran/create', 'Admin\SuratEdaran::create');
$routes->post('admin/surat-edaran/store', 'Admin\SuratEdaran::store');
$routes->get('admin/surat-edaran/edit/(:num)', 'Admin\SuratEdaran::edit/$1');
$routes->post('admin/surat-edaran/update/(:num)', 'Admin\SuratEdaran::update/$1');
$routes->get('admin/surat-edaran/delete/(:num)', 'Admin\SuratEdaran::delete/$1');
$routes->get('admin/surat-edaran/toggle/(:num)', 'Admin\SuratEdaran::toggle/$1');
>>>>>>> edfe71b05b5ecda49679e8bbb86c89b56249933c
