<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function visiMisi()
    {
        return view('pages/visi_misi', [
            'pageTitle' => 'VISI & MISI KORPRI',
        ]);
    }

    public function kontakKami()
    {
        return view('pages/kontak_kami', [
            'pageTitle' => 'KONTAK KAMI',
        ]);

    }
    public function Galeri()
    {
        $data = [
            'pageTitle' => 'GALERI KORPRI ACEH',
            'gallery' => [
                ['image' => base_url('assets/images/galeri1.jpg'), 'title' => 'Kegiatan 1'],
                ['image' => base_url('assets/images/galeri2.jpg'), 'title' => 'Kegiatan 2'],
                ['image' => base_url('assets/images/galeri3.jpg'), 'title' => 'Kegiatan 3'],
                ['image' => base_url('assets/images/galeri4.jpg'), 'title' => 'Kegiatan 4'],
                ['image' => base_url('assets/images/galeri5.jpg'), 'title' => 'Kegiatan 5'],
                ['image' => base_url('assets/images/galeri6.jpg'), 'title' => 'Kegiatan 6'],
            ]
        ];
        return view('pages/Galeri', $data);
    }

    public function Berita()
    {
        $data = [
            'pageTitle' => 'BERITA KORPRI',
            'posts' => [
                [
                    'date' => 'Kamis, 12 September 2024',
                    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                    'image' => null, // isi nanti: base_url('assets/images/berita1.jpg')
                ],
                [
                    'date' => 'Kamis, 12 September 2024',
                    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                    'image' => null,
                ],
                [
                    'date' => 'Kamis, 12 September 2024',
                    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                    'image' => null,
                ],
            ],
        ];

        return view('pages/Berita', $data); // karena file view kamu taruh di app/Views/Berita.php
    }

    public function Sejarah()
    {
        return view('pages/sejarah', [
            'pageTitle' => 'SEJARAH KORPRI',
        ]);
    }

    public function TujuanFungsi()
    {
        return view('pages/tujuan_fungsi', [
            'pageTitle' => 'TUJUAN & FUNGSI KORPRI',
        ]);
    }
    public function Profile()
    {
        return view('pages/Profile', [
            'pageTitle' => 'PROFILE KORPRI',
        ]);
    }
    public function Struktur()
    {
        return view('pages/Struktur', [
            'pageTitle' => 'STRUKTUR KELEMBAGAAN DPKN',
        ]);
    }
    public function Kepengurusan()
    {
        return view('pages/Kepengurusan', [
            'pageTitle' => 'Kepengurusan KORPRI',
        ]);
    }
    public function Program()
    {
        return view('pages/Program', [
            'pageTitle' => 'PROGRAM UTAMA KORPRI',
        ]);
    }
    public function KetuaUmum()
    {
        return view('pages/KetuaUmum', [
            'pageTitle' => 'KETUA UMUM KORPRI',
        ]);
    }
    public function Sekjen()
    {
        return view('pages/Sekjen', [
            'pageTitle' => 'SEKRETARIS JENDRAL KORPRI',
        ]);
    }
    public function Peraturan()
    {
        return view('pages/Peraturan', [
            'pageTitle' => 'PERATURAN KORPRI',
        ]);
    }
    public function Keputusan()
    {
        return view('pages/Keputusan', [
            'pageTitle' => 'KEPUTUSAN KORPRI',
        ]);
    }

    public function SuratEdaran()
    {
        return view('pages/SuratEdaran', [
            'pageTitle' => 'SURAT EDARAN KORPRI',
        ]);
    }

    public function Artikel()
    {
        return view('pages/Artikel', [
            'pageTitle' => 'ARTIKEL KORPRI',
        ]);
    }
    public function Pengumuman()
    {
        return view('pages/Pengumuman', [
            'pageTitle' => 'PENGUMUMAN KORPRI',
        ]);
    }
}
