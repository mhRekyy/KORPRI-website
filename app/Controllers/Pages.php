<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\GaleriModel;
use App\Models\GaleriImageModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    /**
     * ===============================
     * HELPER UNTUK HALAMAN DATABASE
     * ===============================
     */
    protected function renderPage(string $slug)
    {
        $page = $this->pageModel->getPageBySlug($slug);

        if (!$page) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('pages/static', [
            'title'   => strtoupper($page['title']),
            'content' => $page['content'],
        ]);
    }

    /**
     * ===============================
     * HALAMAN DARI DATABASE (pages)
     * ===============================
     */

    public function Profile()
    {
        return view('pages/profile', [
            'pageTitle' => 'PROFILE KORPRI',
        ]);
    }

    public function Struktur()
    {
        return view('pages/struktur',[
            'pageTitle' => 'STRUKTUR KELEMBAGAAN DPKN'
        ]);
    }

    public function Sejarah()
    {
    return view('pages/sejarah', [
        'pageTitle' => 'SEJARAH KORPRI ACEH',
    ]);
    }

    public function TujuanFungsi()
    {
    return view('pages/tujuan_fungsi', [
        'pageTitle' => 'TUJUAN DAN FUNGSI KORPRI',
    ]);
}

    public function visiMisi()
{
    return view('pages/visi_misi', [
        'pageTitle' => 'VISI DAN MISI'
    ]);
}

    public function Program()
{
    return view('pages/program', [
        'pageTitle' => 'PROGRAM KORPRI ACEH',
    ]);
}


    /**
     * ===============================
     * HALAMAN STATIS / HARDCODE
     * ===============================
     */

    public function kontakKami()
    {
        return view('pages/kontak_kami', [
            'pageTitle' => 'KONTAK KAMI',
        ]);
    }

    public function Kepengurusan()
{
    $dokumen = [
        'judul' => 'Susunan Personalia Dewan Pengurus KORPRI Provinsi ACEH',
        'nomor_sk' => 'KEP-37/KU-IX/2026',
        'ditetapkan_oleh' => 'Dewan Pengurus KORPRI Nasional',
        'tanggal' => '01 Januari 2026',
        'status' => 'Aktif / Berlaku',
        'periode' => '2025 - 2026',
        'file_pdf' => 'sk_keputusan.pdf',
        'kategori' => 'Keputusan Resmi',
    ];

    // ini path PDF relatif (tanpa http://localhost...)
    $dokumen['pdf_path'] = base_url('assets/pdf/' . $dokumen['file_pdf']); // tetap untuk download button
    $dokumen['pdfjs_file_param'] = '/assets/pdf/' . $dokumen['file_pdf'];  // relatif untuk viewer (paling aman)

    $dokumen['pdf_viewer_url'] =
        base_url('assets/pdfjs/web/viewer.html?file=') . rawurlencode($dokumen['pdfjs_file_param']); // file param [web:190]

    return view('pages/Kepengurusan', [
        'pageTitle' => 'Kepengurusan KORPRI',
        'dokumen'   => $dokumen,
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


    /**
     * ===============================
     * HALAMAN GALERI (STATIS)
     * ===============================
     */
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

    public function galeri_video()
{
    $data = [
            [
                'youtube_url' => 'https://www.youtube.com/watch?v=M7lc1UVf-VE',
                'tanggal' => '2026-01-27',
                'deskripsi' => 'Contoh deskripsi kegiatan (bisa dari DB).',
            ],
            [
                'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
                'tanggal' => '2026-01-26',
                'deskripsi' => 'Contoh deskripsi kegiatan (bisa dari DB).',
            ],
        ];

        return view('pages/galeri_video', [
            'videos' => $data,
            'pageTitle' => 'GALERI VIDEO KORPRI ACEH',
        ]);
}

    /**
     * ===============================
     * PLACEHOLDER (NANTI PAKAI DB SENDIRI)
     * ===============================
     */

public function Berita()
{
    $model = new \App\Models\BeritaModel();

    $kategori = $this->request->getGet('kategori') ?? 'Semua';
    $keyword  = $this->request->getGet('q');

    $builder = $model->where('is_active', 1);

    if ($kategori !== 'Semua') {
        $builder->where('kategori', $kategori);
    }

    if (!empty($keyword)) {
        $builder->groupStart()
            ->like('judul', $keyword)
            ->orLike('konten', $keyword)
            ->groupEnd();
    }

    return view('pages/Berita', [
        'pageTitle'      => 'BERITA KORPRI ACEH',
        'berita'         => $builder->orderBy('created_at', 'DESC')->findAll(),
        'kategori_aktif' => $kategori,
        'keyword'        => $keyword,
    ]);
}

 public function detailBerita($id)
    {
        $beritaModel = new \App\Models\BeritaModel();

        // Ambil berita utama
        $berita = $beritaModel
            ->where('id', $id)
            ->where('is_active', 1)
            ->first();

        if (!$berita) {
            throw PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }

        // Berita terkini (sidebar)
        $beritaTerkini = $beritaModel
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->find();

        // Kategori (distinct)
        $kategori = $beritaModel
            ->select('kategori')
            ->distinct()
            ->where('is_active', 1)
            ->find();

        // Berita terkait (kategori sama, selain dirinya)
        $beritaTerkait = $beritaModel
            ->where('kategori', $berita['kategori'])
            ->where('id !=', $berita['id'])
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->find();

        return view('pages/berita_detail', [
            'pageTitle'      => 'DETAIL BERITA',
            'berita'         => $berita,
            'beritaTerkini'  => $beritaTerkini,
            'kategoriList'   => $kategori,
            'beritaTerkait'  => $beritaTerkait,
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

//     public function testBerita()
// {
//     $model = new \App\Models\BeritaModel();
//     dd($model->findAll());
// }

}
