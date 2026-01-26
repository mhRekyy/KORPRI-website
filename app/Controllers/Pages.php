<?php

namespace App\Controllers;

use App\Models\PageModel;
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
        return $this->renderPage('profile');
    }

    public function Struktur()
    {
        return $this->renderPage('struktur');
    }

    public function Sejarah()
{
    return view('pages/sejarah', [
        'title' => 'SEJARAH KORPRI ACEH',
    ]);
}

    public function TujuanFungsi()
{
    return view('pages/tujuan_fungsi', [
        'title' => 'TUJUAN DAN FUNGSI KORPRI',
    ]);
}

    public function visiMisi()
{
    return view('pages/visi_misi', [
        'title' => 'VISI DAN MISI'
    ]);
}

    public function Program()
{
    return view('pages/program', [
        'title' => 'PROGRAM KORPRI ACEH',
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
        return view('pages/Kepengurusan', [
            'pageTitle' => 'KEPENGURUSAN KORPRI',
        ]);
    }

    public function KetuaUmum()
    {
        $dataKetua = [
            [
                'nama' => 'Dr. H. M. Zaini Abdullah',
                'foto' => 'ketua_1.jpg',
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
        ];

        return view('pages/KetuaUmum', [
            'pageTitle'  => 'PROFIL KETUA UMUM KORPRI MASA KE MASA',
            'ketua_list' => $dataKetua,
        ]);
    }

    public function Sekjen()
    {
        $dataSekjen = [
            [
                'nama' => 'Dr. H. M. Zaini Abdullah',
                'foto' => 'sekjen_1.jpg',
                'periode' => '2012 - 2017'
            ],
            [
                'nama' => 'Ir. Nova Iriansyah, M.T.',
                'foto' => 'sekjen_2.jpg',
                'periode' => '2017 - 2022'
            ],
            [
                'nama' => 'Achmad Marzuki',
                'foto' => 'sekjen_3.jpg',
                'periode' => '2022 - 2023'
            ],
        ];

        return view('pages/Sekjen', [
            'pageTitle'   => 'PROFIL SEKRETARIS JENDERAL KORPRI MASA KE MASA',
            'sekjen_list' => $dataSekjen,
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
