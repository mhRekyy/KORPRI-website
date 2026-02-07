<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\ArtikelModel;
use App\Models\PengumumanModel;
use App\Models\PeraturanModel;
use App\Models\KeputusanModel;
use App\Models\SuratEdaranModel;
use App\Models\GaleriModel;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $beritaModel       = new BeritaModel();
        $artikelModel      = new ArtikelModel();
        $pengumumanModel   = new PengumumanModel();
        $peraturanModel    = new PeraturanModel();
        $keputusanModel    = new KeputusanModel();
        $suratEdaranModel  = new SuratEdaranModel();
        $galeriModel       = new GaleriModel();
        // $usersModel        = new UsersModel();

        $data = [
            'title' => 'Dashboard Admin',

            'stat' => [
                'berita'        => $beritaModel->countAll(),
                'artikel'       => $artikelModel->countAll(),
                'pengumuman'    => $pengumumanModel->countAll(),
                'peraturan'     => $peraturanModel->countAll(),
                'keputusan'     => $keputusanModel->countAll(),
                'surat_edaran'  => $suratEdaranModel->countAll(),
                'galeri'        => $galeriModel->countAll(),
            ],

            'berita_status' => [
                'publish' => $beritaModel->where('is_active', 1)->countAllResults(),
                'draft'   => $beritaModel->where('is_active', 0)->countAllResults(),
            ],

            'artikel_status' => [
                'publish' => $artikelModel->where('is_active', 1)->countAllResults(),
                'draft'   => $artikelModel->where('is_active', 0)->countAllResults(),
            ],

            'latest_berita' => $beritaModel
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->find(),

            'admin_name' => session()->get('name') ?? 'Admin',
            'now'        => date('d M Y, H:i'),
        ];


        return view('admin/dashboard', $data);
    }
}
