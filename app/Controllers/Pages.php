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
