<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Home extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();

        // contoh: 3 berita terbaru aktif untuk landing page
        $latestNews = $beritaModel
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll(3);

        $data = [
            'title' => 'Beranda - KORPRI Aceh',

            'slides' => [
                ['image' => base_url('assets/img/slide-1.JPG'), 'caption' => 'Upacara KORPRI Aceh'],
                ['image' => base_url('assets/img/slide-2.JPG'), 'caption' => 'MUSPROF KORPRI ACEH 2025'],
                ['image' => base_url('assets/img/slide-3.JPG'), 'caption' => 'Pornas KORPRI XVII'],
            ],

            // GANTI news statis -> dari DB
            'news' => $latestNews,

            'pengumuman' => [
                ['title' => 'Pengumuman 1', 'link' => '/pengumuman/1'],
                ['title' => 'Pengumuman 2', 'link' => '/pengumuman/2'],
                ['title' => 'Pengumuman 3', 'link' => '/pengumuman/3'],
            ],

             'tentang_korpri' => ['Korps Pegawai Republik Indonesia (KORPRI) adalah wadah tunggal untuk menghimpun seluruh Pegawai Republik Indonesia demi meningkatkan perjuangan, pengabdian, serta kesetiaan kepada cita-cita perjuangan Bangsa dan Negara Kesatuan Republik Indonesia.',
             
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

            'gallery' => [
                ['image' => base_url('uploads/galeri/rapat1.jpg'), 'title' => 'Kegiatan 1'],
                ['image' => base_url('uploads/galeri/rapat2.jpg'), 'title' => 'Kegiatan 2'],
                ['image' => base_url('uploads/galeri/rapat3.jpg'), 'title' => 'Kegiatan 3'],
                ['image' => base_url('uploads/galeri/rapat4.jpg'), 'title' => 'Kegiatan 4'],
                ['image' => base_url('uploads/galeri/rapat5.jpg'), 'title' => 'Kegiatan 5'],
            ],
        ];

        return view('home', $data);
    }
}
