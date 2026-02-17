<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===============================
// PUBLIC ROUTES
// ===============================
$routes->get('/', 'Home::index');

$routes->get('pdf/(:any)', 'Files::show/$1');

$routes->get('kontak-kami', 'Pages::kontakKami');
$routes->post('kontak-kami/kirim', 'Pages::kirimKontak');
$routes->get('test-email', 'Pages::testEmail');

$routes->get('profile', 'Pages::Profile');
$routes->get('struktur', 'Pages::Struktur');
$routes->get('sejarah', 'Pages::Sejarah');
$routes->get('tujuan_fungsi', 'Pages::TujuanFungsi');
$routes->get('visi-misi', 'Pages::visiMisi');
$routes->get('Program', 'Pages::Program');
$routes->get('kepengurusan', 'Pages::Kepengurusan');
$routes->get('KetuaUmum', 'Pages::KetuaUmum');
$routes->get('Sekjen', 'Pages::Sekjen');

$routes->get('galeri', 'Pages::Galeri');
$routes->get('galeri_video', 'Pages::galeri_video');

$routes->get('berita', 'Pages::Berita');
$routes->get('berita/(:num)', 'Pages::detailBerita/$1');

$routes->get('artikel', 'Pages::artikel');
$routes->get('artikel/(:segment)', 'Pages::ArtikelDetail/$1');

$routes->get('peraturan', 'Pages::peraturan');
$routes->get('Keputusan', 'Pages::Keputusan');
$routes->get('suratedaran', 'Pages::suratedaran');
$routes->get('pengumuman', 'Pages::pengumuman');


// ===============================
// AUTH ROUTES
// ===============================
$routes->get('login', 'Auth\Login::index');
$routes->post('login', 'Auth\Login::process');
$routes->get('logout', 'Auth\Login::logout');


// ===============================
// ADMIN ROOT (GATE)
// ===============================
$routes->get('admin', function () {
    if (! session()->get('admin_logged_in')) {
        return redirect()->to('/login');
    }
    return redirect()->to('/admin/dashboard');
});

$routes->get('admin/', function () {
    if (! session()->get('admin_logged_in')) {
        return redirect()->to('/login');
    }
    return redirect()->to('/admin/dashboard');
});


// ===============================
// ADMIN ROUTES (PROTECTED)
// ===============================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // DASHBOARD
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // ===============================
    // BERITA
    // ===============================
    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/create', 'Admin\Berita::create');
    $routes->post('berita/store', 'Admin\Berita::store');
    $routes->get('berita/edit/(:num)', 'Admin\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');

    $routes->get('berita/toggle/(:num)', 'Admin\Berita::toggle/$1');
    $routes->get('berita/delete/(:num)', 'Admin\Berita::delete/$1');

    // ===============================
    // PERATURAN
    // ===============================
    $routes->get('peraturan', 'Admin\Peraturan::index');
    $routes->get('peraturan/create', 'Admin\Peraturan::create');
    $routes->post('peraturan/store', 'Admin\Peraturan::store');
    $routes->get('peraturan/edit/(:num)', 'Admin\Peraturan::edit/$1');
    $routes->post('peraturan/update/(:num)', 'Admin\Peraturan::update/$1');
    $routes->get('peraturan/delete/(:num)', 'Admin\Peraturan::delete/$1');
    $routes->get('peraturan/toggle/(:num)', 'Admin\Peraturan::toggle/$1');

    // ===============================
    // ARTIKEL
    // ===============================
    $routes->get('artikel', 'Admin\Artikel::index');
    $routes->get('artikel/create', 'Admin\Artikel::create');
    $routes->post('artikel/store', 'Admin\Artikel::store');
    $routes->get('artikel/edit/(:num)', 'Admin\Artikel::edit/$1');
    $routes->get('artikel/delete/(:num)', 'Admin\Artikel::delete/$1');
    $routes->get('artikel/toggle/(:num)', 'Admin\Artikel::toggle/$1');
    $routes->post('artikel/update/(:num)', 'Admin\Artikel::update/$1');

    // ===============================
    // KEPUTUSAN
    // ===============================
    $routes->get('keputusan', 'Admin\Keputusan::index');
    $routes->get('keputusan/create', 'Admin\Keputusan::create');
    $routes->post('keputusan/store', 'Admin\Keputusan::store');
    $routes->get('keputusan/edit/(:num)', 'Admin\Keputusan::edit/$1');
    $routes->post('keputusan/update/(:num)', 'Admin\Keputusan::update/$1');
    $routes->get('keputusan/delete/(:num)', 'Admin\Keputusan::delete/$1');
    $routes->get('keputusan/toggle/(:num)', 'Admin\Keputusan::toggle/$1');

    // ===============================
    // PENGUMUMAN
    // ===============================
    $routes->get('pengumuman', 'Admin\Pengumuman::index');
    $routes->get('pengumuman/create', 'Admin\Pengumuman::create');
    $routes->post('pengumuman/store', 'Admin\Pengumuman::store');
    $routes->get('pengumuman/edit/(:num)', 'Admin\Pengumuman::edit/$1');
    $routes->get('pengumuman/delete/(:num)', 'Admin\Pengumuman::delete/$1');
    $routes->get('pengumuman/toggle/(:num)', 'Admin\Pengumuman::toggle/$1');

    // ===============================
    // SURAT EDARAN
    // ===============================
    $routes->get('surat-edaran', 'Admin\SuratEdaran::index');
    $routes->get('surat-edaran/create', 'Admin\SuratEdaran::create');
    $routes->post('surat-edaran/store', 'Admin\SuratEdaran::store');
    $routes->get('surat-edaran/edit/(:num)', 'Admin\SuratEdaran::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'Admin\Pengumuman::update/$1');
    $routes->get('surat-edaran/delete/(:num)', 'Admin\SuratEdaran::delete/$1');
    $routes->get('surat-edaran/toggle/(:num)', 'Admin\SuratEdaran::toggle/$1');
    $routes->post('surat-edaran/update/(:num)', 'Admin\SuratEdaran::update/$1');


    // ===============================
    // STRUKTUR DPK
    // ===============================
    $routes->get('struktur-dpk', 'Admin\StrukturDpk::index');
    $routes->get('struktur-dpk/edit/(:num)', 'Admin\StrukturDpk::edit/$1');
    $routes->post('struktur-dpk/update/(:num)', 'Admin\StrukturDpk::update/$1');
    $routes->get('struktur-dpk/delete/(:num)', 'Admin\StrukturDpk::delete/$1');

    // ===============================
    // PROFIL KORPRI
    // ===============================
    $routes->get('profil-korpri', 'Admin\ProfilKorpri::index');
    $routes->get('profil-korpri/create', 'Admin\ProfilKorpri::create');
    $routes->post('profil-korpri/store', 'Admin\ProfilKorpri::store');
    $routes->get('profil-korpri/edit/(:num)', 'Admin\ProfilKorpri::edit/$1');
    $routes->post('profil-korpri/update/(:num)', 'Admin\ProfilKorpri::update/$1');
    $routes->get('profil-korpri/deactivate/(:num)', 'Admin\ProfilKorpri::deactivate/$1');
    $routes->get('profil-korpri/activate/(:num)', 'Admin\ProfilKorpri::activate/$1');

    // ===============================
    // USER ADMIN
    // ===============================
    $routes->get('user-admin', 'Admin\UserAdmin::index');
    $routes->get('user-admin/create', 'Admin\UserAdmin::create');
    $routes->post('user-admin/store', 'Admin\UserAdmin::store');
    $routes->get('user-admin/edit/(:num)', 'Admin\UserAdmin::edit/$1');
    $routes->post('user-admin/update/(:num)', 'Admin\UserAdmin::update/$1');

    // ===============================
    // ADMIN LOG
    // ===============================
    $routes->get('logs', 'Admin\AdminLog::index');

    // ===============================
    // PROFIL KETUA UMUM
    // ===============================
    $routes->get('ketua-umum', 'Admin\KetuaUmumController::index');
    $routes->get('ketua-umum/create', 'Admin\KetuaUmumController::create');
    $routes->post('ketua-umum/store', 'Admin\KetuaUmumController::store');
    $routes->get('ketua-umum/edit/(:num)', 'Admin\KetuaUmumController::edit/$1');
    $routes->post('ketua-umum/update/(:num)', 'Admin\KetuaUmumController::update/$1');
    $routes->get('ketua-umum/delete/(:num)', 'Admin\KetuaUmumController::delete/$1');
    $routes->get('ketua-umum/toggle/(:num)', 'Admin\KetuaUmumController::toggle/$1');

    // ===============================
    // PROFIL SEKRETARIS JENDERAL
    // ===============================
    $routes->get('sekretaris-jenderal', 'Admin\SekretarisJenderalController::index');
    $routes->get('sekretaris-jenderal/create', 'Admin\SekretarisJenderalController::create');
    $routes->post('sekretaris-jenderal/store', 'Admin\SekretarisJenderalController::store');
    $routes->get('sekretaris-jenderal/edit/(:num)', 'Admin\SekretarisJenderalController::edit/$1');
    $routes->post('sekretaris-jenderal/update/(:num)', 'Admin\SekretarisJenderalController::update/$1');
    $routes->get('sekretaris-jenderal/delete/(:num)', 'Admin\SekretarisJenderalController::delete/$1');
    $routes->get('sekretaris-jenderal/toggle/(:num)', 'Admin\SekretarisJenderalController::toggle/$1');

    // ===============================
    // GALERI FOTO (ADMIN)
    // ===============================
    $routes->get('galeri/foto', 'Admin\GaleriFotoController::index');
    $routes->get('galeri/foto/create', 'Admin\GaleriFotoController::create');
    $routes->post('galeri/foto/store', 'Admin\GaleriFotoController::store');
    $routes->get('galeri/foto/edit/(:num)', 'Admin\GaleriFotoController::edit/$1');
    $routes->post('galeri/foto/update/(:num)', 'Admin\GaleriFotoController::update/$1');
    $routes->post('galeri/foto/delete/(:num)', 'Admin\GaleriFotoController::delete/$1');

    $routes->get('galeri/foto/kelola/(:num)', 'Admin\GaleriFotoController::kelolaFoto/$1');
    $routes->post('galeri/foto/upload/(:num)', 'Admin\GaleriFotoController::uploadFoto/$1');
    $routes->post('galeri/foto/hapus-foto/(:num)', 'Admin\GaleriFotoController::hapusFoto/$1');

    // ===============================
    // GALERI VIDEO (ADMIN)
    // ===============================
    $routes->get('galeri/video', 'Admin\GaleriVideoController::index');
    $routes->get('galeri/video/create', 'Admin\GaleriVideoController::create');
    $routes->post('galeri/video/store', 'Admin\GaleriVideoController::store');
    $routes->get('galeri/video/edit/(:num)', 'Admin\GaleriVideoController::edit/$1');
    $routes->post('galeri/video/update/(:num)', 'Admin\GaleriVideoController::update/$1');
    $routes->post('galeri/video/delete/(:num)', 'Admin\GaleriVideoController::delete/$1');


    // ===============================
    // Hero image (ADMIN)
    // ===============================
    $routes->get('hero', 'Admin\Hero::index');
    $routes->get('hero/create', 'Admin\Hero::create');
    $routes->post('hero/store', 'Admin\Hero::store');
    $routes->get('hero/edit/(:num)', 'Admin\Hero::edit/$1');
    $routes->post('hero/update/(:num)', 'Admin\Hero::update/$1');
    $routes->get('hero/delete/(:num)', 'Admin\Hero::delete/$1');


});