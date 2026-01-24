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
            'pageTitle' => 'BERITA KORPRI ACEH',
            'berita' => [
                [
                    'id' => 1,
                    'judul' => 'Rapat Koordinasi Pengurus DP KORPRI Aceh',
                    'deskripsi' => 'Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan. Rapat rutin pengurus Daerah Pemda KORPRI Aceh membahas program pengembangan anggota dan kesejahteraan ASN di wilayah Aceh Utara hingga Selatan.',
                    'gambar' => 'assets/img/slide-1.jpg',
                    'slug' => 'rapat-koordinasi-korpri-aceh',
                    'tanggal' => '20 Januari 2026'
                ],
                [
                    'id' => 2,
                    'judul' => 'Pelatihan Digitalisasi Birokrasi ASN Aceh',
                    'deskripsi' => 'KORPRI Aceh bekerja sama dengan BKA Aceh menggelar pelatihan teknologi informasi untuk meningkatkan kompetensi pegawai negeri sipil.',
                    'gambar' => 'assets/img/berita/2.jpg',
                    'slug' => 'pelatihan-digitalisasi-asn',
                    'tanggal' => '20 Januari 2026'
                ],
                [
                    'id' => 3,
                    'judul' => 'Perayaan HUT KORPRI ke-52 Banda Aceh',
                    'deskripsi' => 'Suksesnya peringatan Hari Ulang Tahun Korps Pegawai Republik Indonesia dengan berbagai kegiatan sosial, olahraga, dan keagamaan.',
                    'gambar' => 'assets/img/berita/3.jpg',
                    'slug' => 'hut-korpri-52-banda-aceh',
                    'tanggal' => '20 Januari 2026'
                ],
                [
                    'id' => 4,
                    'judul' => 'Penguatan Ideologi ASN oleh KORPRI Aceh',
                    'deskripsi' => 'Program penguatan nilai-nilai Pancasila dan karakter ASN melalui seminar dan workshop di seluruh kabupaten/kota Aceh.',
                    'gambar' => 'assets/img/berita/4.jpg',
                    'slug' => 'penguatan-ideologi-asn',
                    'tanggal' => '20 Januari 2026'
                ]
            ]
        ];

        return view('pages/Berita', $data);
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
        $data = [
            'pageTitle' => 'Kepengurusan KORPRI',
            'dokumen' => [
                'judul' => 'Susunan Personalia Dewan Pengurus KORPRI Provinsi ACEH',
                'nomor_sk' => 'KEP-37/KU-IX/2026',
                'ditetapkan_oleh' => 'Dewan Pengurus KORPRI Nasional',
                'tanggal' => '01 Januari 2026',
                'status' => 'Aktif / Berlaku',
                'periode' => '2025 - 2026',
                'file_pdf' => 'sk_kepengurusan.pdf', // Pastikan file ini ada di public/assets/pdf/
                'kategori' => 'Keputusan Resmi'
            ],
        ];

        return view('pages/Kepengurusan', $data);
    }



    public function Program()
    {
        return view('pages/Program', [
            'pageTitle' => 'PROGRAM UTAMA KORPRI',
        ]);
    }



    public function KetuaUmum()
    {
        $dataKetua = [
            [
                'nama' => 'Dr. H. M. Zaini Abdullah', 
                'foto' => 'ketua_1.jpg', // Ganti dengan nama file aslimu nanti
                'periode' => '2012 - 2017'
            ],
            [
                'nama' => 'Ir. Nova Iriansyah, M.T.', 
                'foto' => 'ketua_2.jpg',
                'periode' => '2017 - 2022'
            ],
            [
                'nama' => 'Achmad Marzuki', 
                'foto' => 'ketua_3.jpg',
                'periode' => '2022 - 2023'
            ],
            [
                'nama' => 'Bustami Hamzah, S.E., M.Si.', 
                'foto' => 'ketua_4.jpg',
                'periode' => '2023 - Sekarang'
            ],
            // Data kosong untuk placeholder (kotak abu-abu) sesuai gambar
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
        ];

        return view('pages/KetuaUmum', [
            'pageTitle'  => 'PROFIL KETUA UMUM KORPRI MASA KE MASA',
            'ketua_list' => $dataKetua // Data ini akan dipanggil di foreach View
        ]);
    }



    public function Sekjen()
    {
        $dataSekjen = [
            [
                'nama' => 'Dr. H. M. Zaini Abdullah', 
                'foto' => 'ketua_1.jpg', // Ganti dengan nama file aslimu nanti
                'periode' => '2012 - 2017'
            ],
            [
                'nama' => 'Ir. Nova Iriansyah, M.T.', 
                'foto' => 'ketua_2.jpg',
                'periode' => '2017 - 2022'
            ],
            [
                'nama' => 'Achmad Marzuki', 
                'foto' => 'ketua_3.jpg',
                'periode' => '2022 - 2023'
            ],
            [
                'nama' => 'Bustami Hamzah, S.E., M.Si.', 
                'foto' => 'ketua_4.jpg',
                'periode' => '2023 - Sekarang'
            ],
            // Data kosong untuk placeholder (kotak abu-abu) sesuai gambar
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
            ['nama' => '', 'foto' => '', 'periode' => ''],
        ];

        return view('pages/Sekjen', [
            'pageTitle'  => 'PROFIL SEKRETARIS JENDERAL KORPRI MASA KE MASA',
            'Sekjen_list' => $dataSekjen // Data ini akan dipanggil di foreach View
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
