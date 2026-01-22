<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('visi-misi', 'Pages::visiMisi');
$routes->get('kontak-kami', 'Pages::kontakKami');
$routes->get('galeri', 'Pages::Galeri');
$routes->get('berita', 'Pages::Berita');
$routes->get('sejarah', 'Pages::Sejarah');
$routes->get('tujuan_fungsi', 'Pages::TujuanFungsi');


$routes->get('profile', 'Pages::Profile');
$routes->get('struktur', 'Pages::Struktur');
$routes->get('kepengurusan', 'Pages::Kepengurusan');
$routes->get('Program', 'Pages::Program');
$routes->get('KetuaUmum', 'Pages::KetuaUmum');
$routes->get('Sekjen', 'Pages::Sekjen');
$routes->get('Peraturan', 'Pages::Peraturan');
$routes->get('Keputusan', 'Pages::Keputusan');
$routes->get('SuratEdaran', 'Pages::SuratEdaran');
$routes->get('Artikel', 'Pages::Artikel');
$routes->get('Pengumuman', 'Pages::Pengumuman');
