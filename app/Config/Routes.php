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




