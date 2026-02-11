<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\PengumumanModel;
use App\Models\HeroModel;

class Home extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();

        $latestNews = $beritaModel
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll(3);

        $pengumumanModel = new PengumumanModel();
        $latestPengumuman = $pengumumanModel
            ->where('is_active', 1)
            ->orderBy('tanggal_pengumuman', 'DESC')
            ->limit(5)
            ->findAll();

        /*
        ============================================
        HERO DINAMIS DARI DATABASE
        ============================================
        */

        $heroModel = new HeroModel();
        $slidesDb  = $heroModel->getActiveSlides();

        $slides = [];

        if (!empty($slidesDb)) {
            foreach ($slidesDb as $row) {
                $slides[] = [
                    'image'       => base_url('uploads/hero/' . $row['image']),
                    'caption'     => $row['title'],
                    'description' => $row['description'], // ✅ TAMBAHAN
                ];
            }
        } else {
            // Fallback jika belum ada data
            $slides = [
                [
                    'image' => base_url('assets/img/slide-1.JPG'),
                    'caption' => 'Upacara KORPRI Aceh',
                    'description' => ''
                ],
                [
                    'image' => base_url('assets/img/slide-2.JPG'),
                    'caption' => 'MUSPROF KORPRI ACEH 2025',
                    'description' => ''
                ],
                [
                    'image' => base_url('assets/img/slide-3.JPG'),
                    'caption' => 'Pornas KORPRI XVII',
                    'description' => ''
                ],
            ];
        }

        /*
        ============================================
        GALERI
        ============================================
        */

        $db = \Config\Database::connect();

        $kegiatanData = $db->table('galeri_kegiatan')
            ->orderBy('tanggal_kegiatan', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        $gallery = [];

        foreach ($kegiatanData as $row) {

            $foto = $db->table('galeri_foto')
                ->select('file_name')
                ->where('galeri_kegiatan_id', $row['id'])
                ->orderBy('id', 'ASC')
                ->limit(1)
                ->get()
                ->getRowArray();

            if ($foto) {
                $gallery[] = [
                    'image' => base_url('uploads/galeri/foto/' . $foto['file_name']),
                    'title' => $row['judul_kegiatan'],
                ];
            }
        }

        $data = [
            'title' => 'Beranda - KORPRI Aceh',

            'slides' => $slides,

            'news' => $latestNews,

            'pengumuman' => $latestPengumuman,

            'gallery' => $gallery,

            'tentang_korpri' => [
                'Korps Pegawai Republik Indonesia (KORPRI) adalah wadah tunggal untuk menghimpun seluruh Pegawai Republik Indonesia demi meningkatkan perjuangan, pengabdian, serta kesetiaan kepada cita-cita perjuangan Bangsa dan Negara Kesatuan Republik Indonesia.',

                'Berdiri sejak 29 November 1971 berdasarkan Keputusan Presiden Nomor 82 Tahun 1971, KORPRI berfungsi sebagai perekat dan pemersatu bangsa, menjaga netralitas, serta berkomitmen teguh untuk melayani masyarakat dengan profesionalisme dan integritas tinggi berlandaskan Panca Prasetya KORPRI.',
            ],

            'programs' => [
                [
                    'icon' => 'fas fa-gavel',
                    'title' => 'DIGITALISAI BIROKRASI',
                    'description' => 'Layanan konsultasi dan bantuan hukum untuk anggota KORPRI',
                    'link' => '/program/bantuan-hukum'
                ],
                [
                    'icon' => 'fas fa-hand-holding-usd',
                    'title' => 'PENGUATAN NILAI ASN',
                    'description' => 'Program peningkatan kesejahteraan anggota KORPRI',
                    'link' => '/program/kesejahteraan'
                ],
                [
                    'icon' => 'fas fa-building',
                    'title' => 'PERLINDUNGAN KARIR',
                    'description' => 'Koperasi KORPRI untuk kemajuan ekonomi anggota',
                    'link' => '/program/koperasi'
                ],
                [
                    'icon' => 'fas fa-store',
                    'title' => 'KESEJAHTERAAN ASN',
                    'description' => 'Pemberdayaan UMKM untuk anggota KORPRI',
                    'link' => '/program/umkm'
                ],
            ],
        ];

        return view('home', $data);
    }
}
