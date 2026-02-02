<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('pdf/(:any)', 'Files::show/$1');

$routes->get('/', 'Home::index');

$routes->get('kontak-kami', 'Pages::kontakKami');

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
$routes->get('Peraturan', 'Pages::Peraturan');
$routes->get('Keputusan', 'Pages::Keputusan');
$routes->get('SuratEdaran', 'Pages::SuratEdaran');
$routes->get('artikel', 'Pages::artikel');
$routes->get('artikel/(:segment)', 'Pages::ArtikelDetail');

$routes->get('Pengumuman', 'Pages::Pengumuman');
// $routes->get('test-berita', 'Pages::testBerita');
$routes->get('berita', 'Pages::Berita');
$routes->get('berita/(:num)', 'Pages::detailBerita/$1');



