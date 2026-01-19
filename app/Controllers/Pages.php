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
}
