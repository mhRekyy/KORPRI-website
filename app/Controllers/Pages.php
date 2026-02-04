<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\GaleriModel;
use App\Models\GaleriImageModel;
use App\Models\StrukturDPKModel;
use App\Models\ProfilKorpriModel;
use App\Models\ArtikelModel;
use App\Models\PengumumanModel;
use App\Models\PeraturanModel;
use App\Models\KeputusanModel;
use App\Models\SuratEdaranModel;



use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

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


    public function profile()
    {
        $model = new ProfilKorpriModel();

        $masaBakti = $this->request->getGet('masa_bakti');
        $struktur  = $this->request->getGet('struktur');
        $keyword   = $this->request->getGet('q'); // 🔑 TAMBAH INI

        return view('pages/Profile', [
            'pageTitle' => 'PROFIL KORPRI',
            'dataProfil' => $model->getFiltered($masaBakti, $struktur, $keyword),
            'listMasaBakti' => $model->select('masa_bakti')->distinct()->findAll(),
            'listStruktur'  => $model->select('struktur')->distinct()->findAll(),
            'masaBaktiAktif' => $masaBakti,
            'strukturAktif'  => $struktur,
            'keyword'        => $keyword, // 🔑 TAMBAH INI
        ]);
    }



    public function struktur()
    {
        $model = new StrukturDPKModel();

        // Ketua
        $ketua = $model->where('level', 1)
                    ->where('is_active', 1)
                    ->first();

        // Wakil Ketua
        $wakil = $model->where('level', 2)
                    ->where('is_active', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();

        // Semua anak (level 3 & 4)
        $rows = $model->whereIn('level', [3,4])
                    ->where('is_active', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();

        // 🔑 KELOMPOKKAN BERDASARKAN parent_id
        $children = [];
        foreach ($rows as $row) {
            if ($row['parent_id']) {
                $children[$row['parent_id']][] = $row;
            }
        }

        return view('pages/struktur', [
            'ketua'    => $ketua,
            'wakil'    => $wakil,
            'children' => $children,
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

    public function kirimKontak()
{
    $nama   = $this->request->getPost('nama');
    $nomor  = $this->request->getPost('nomor');
    $email  = $this->request->getPost('email');
    $subjek = $this->request->getPost('subjek');
    $pesan  = $this->request->getPost('pesan');

    if (!$nama || !$email || !$pesan) {
        return redirect()->back()->with('error', 'Mohon lengkapi data yang wajib diisi.');
    }

    $emailService = \Config\Services::email();

        $emailService->setFrom(
            'muhammadrekyyyy@gmail.com',
            'Website KORPRI'
        );

        $emailService->setTo('muhammadrekyyyy@gmail.com');
        $emailService->setReplyTo($email, $nama);
        $emailService->setSubject($subjek ?: 'Pesan dari Form Kontak Website');

        $emailService->setMessage("
            <strong>Nama:</strong> {$nama}<br>
            <strong>Email:</strong> {$email}<br>
            <strong>No HP:</strong> {$nomor}<br><br>
            <strong>Pesan:</strong><br>{$pesan}
        ");

       if ($emailService->send()) {
            return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
        } else {
            return redirect()->back()
                ->with('error', 'Pesan gagal dikirim.')
                ->with('debug', $emailService->printDebugger(['headers']));
        }


}


    public function testEmail()
    {
        $email = \Config\Services::email();

        $email->setTo('muhammadrekyyyy@gmail.com'); // ganti ke email kamu
        $email->setSubject('TEST CI4');
        $email->setMessage('EMAIL TEST BERHASIL');

        if ($email->send()) {
            echo 'EMAIL BERHASIL DIKIRIM';
        } else {
            echo $email->printDebugger(['headers', 'subject', 'body']);
        }
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
    $galeriModel = new \App\Models\GaleriModel();
    $imageModel  = new \App\Models\GaleriImageModel();

    $galeri = $galeriModel
        ->where('is_active', 1)
        ->orderBy('id', 'DESC')
        ->findAll();

    $sections = [];

    foreach ($galeri as $item) {

        $images = $imageModel
            ->where('galeri_id', $item['id'])
            ->where('is_active', 1)
            ->orderBy('id', 'ASC')
            ->findAll();

        $chunks = array_chunk($images, 8);

        foreach ($chunks as $chunk) {
            $tiles = [];

            foreach ($chunk as $img) {
                $tiles[] = [
                    'image' => $img['image'],
                    'title' => $img['title'] ?? '', // ✅ AMAN
                ];
            }

            $sections[] = $tiles;
        }
    }

    return view('pages/Galeri', [
        'pageTitle' => 'GALERI KORPRI ACEH',
        'sections'  => $sections
    ]);
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

        // Query dasar: hanya aktif + urut terbaru
        $builder = $model->where('is_active', 1)
                        ->orderBy('created_at', 'DESC');

        if ($kategori !== 'Semua') {
            $builder->where('kategori', $kategori);
        }

        if (!empty($keyword)) {
            $builder->groupStart()
                    ->like('judul', $keyword)
                    ->orLike('konten', $keyword)
                    ->groupEnd();
        }

        // Pagination: 10 per halaman
        $berita = $builder->paginate(6, 'berita');
        $pager  = $model->pager;

        // Opsional tapi membantu: pastikan base path pagination sesuai URL saat ini
        // (agar link pager tidak “lari” kalau route kamu unik)
        $pager->setPath(current_url(), 'berita'); // setPath() tersedia di Pager [web:93]

        return view('pages/Berita', [
            'pageTitle'      => 'BERITA KORPRI ACEH',
            'berita'         => $berita,
            'pager'          => $pager,
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
    $model = new \App\Models\ArtikelModel();

    $keyword = $this->request->getGet('q') ?? '';

    // Builder dasar
    $builder = $model->where('is_active', 1)
                     ->orderBy('published_at', 'DESC');

    // Search
    if ($keyword !== '') {
        $builder->groupStart()
                ->like('title', $keyword)     // sesuaikan nama kolom jika 'judul'
                ->orLike('content', $keyword)  // sesuaikan jika kolomnya berbeda
                ->groupEnd();
    }

    // Pagination 6 per halaman, group 'artikel'
    $artikel = $builder->paginate(6, 'artikel');
    $pager   = $model->pager;

    // Jangan pakai current_url() dulu (biar tidak dobel)
    // Kalau butuh: $pager->setPath(site_url('artikel'), 'artikel');

    return view('pages/Artikel', [
        'pageTitle' => 'ARTIKEL KORPRI ACEH',
        'artikel'   => $artikel,
        'pager'     => $pager,
        'keyword'   => $keyword,
    ]);
}





public function ArtikelDetail($slug)
{
    $model = new \App\Models\ArtikelModel();

    $artikel = $model
        ->where('slug', $slug)
        ->where('is_active', 1)
        ->where('published_at <=', date('Y-m-d H:i:s'))
        ->first();

    if (!$artikel) {
        throw PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
    }

    return view('pages/ArtikelDetail', [
        'pageTitle' => $artikel['title'],
        'artikel'   => $artikel,
    ]);
}


public function pengumuman()
{

    $pengumumanModel = new PengumumanModel();

    // Ambil parameter dari GET
    $keyword     = $this->request->getGet('q');
    $kategori    = $this->request->getGet('kategori');
    $masa_bakti  = $this->request->getGet('masa_bakti');

    // Query dasar
    $builder = $pengumumanModel
        ->where('is_active', 1);

    // Filter SEARCH (judul)
    if (!empty($keyword)) {
        $builder->like('judul', $keyword);
    }

    // Filter KATEGORI
    if (!empty($kategori)) {
        $builder->where('kategori', $kategori);
    }

    // 🔥 Filter MASA BAKTI (INI YANG KURANG)
    if (!empty($masa_bakti)) {
        $builder->where('masa_bakti', $masa_bakti);
    }

    // Ambil data
    $pengumuman = $builder
        ->orderBy('tanggal_pengumuman', 'DESC')
        ->findAll();

    return view('pages/Pengumuman', [
        'pageTitle' => 'Pengumuman KORPRI',
        'pengumuman' => $pengumuman
    ]);
}


    public function peraturan()
{
        $model = new PeraturanModel();

        // Ambil parameter GET
        $kategori   = $this->request->getGet('kategori');
        $masaBakti  = $this->request->getGet('masa_bakti');
        $keyword    = $this->request->getGet('keyword');

        // Query dasar
        $builder = $model->where('is_active', 1);

        // Filter kategori
        if (!empty($kategori)) {
            $builder->where('kategori', $kategori);
        }

        // Filter masa bakti
        if (!empty($masaBakti)) {
            $builder->where('masa_bakti', $masaBakti);
        }

        // Search judul
        if (!empty($keyword)) {
            $builder->like('judul', $keyword);
        }

        // Ambil data
        $data['peraturan'] = $builder
            ->orderBy('tanggal_penetapan', 'DESC')
            ->findAll();

        // Data dropdown
        $data['kategoriList'] = [
            'Peraturan Perundang-undangan',
            'Peraturan Gubernur',
            'Peraturan Daerah',
            'Peraturan KORPRI'
        ];

        $data['masaBaktiList'] = [
            '2016–2021',
            '2021–2026'
        ];

        return view('pages/peraturan', $data);
}



   

public function keputusan()
{
    $model = new KeputusanModel();

    // Ambil parameter GET
    $masa  = $this->request->getGet('masa');
    $jenis = $this->request->getGet('jenis');
    $q     = $this->request->getGet('q');

    $builder = $model->where('is_active', 1);

    if (!empty($masa)) {
        // Samakan format: "2021 - 2026" -> "2021–2026"
        $masa = str_replace(' - ', '–', $masa);
        $builder->where('masa_bakti', $masa);
    }

    if (!empty($jenis)) {
        $builder->where('jenis_keputusan', $jenis);
    }

    if (!empty($q)) {
        $builder->like('judul', $q);
    }

    $data['items'] = $builder
        ->orderBy('tanggal_keputusan', 'DESC')
        ->findAll();

    return view('pages/Keputusan', $data);
}


public function SuratEdaran()
{
    $model = new SuratEdaranModel();

    $masa  = $this->request->getGet('masa');
    $jenis = $this->request->getGet('jenis');
    $q     = $this->request->getGet('q');

    $builder = $model->where('is_active', 1);

    if (!empty($masa)) {
        $masa = str_replace(' - ', '–', $masa);
        $builder->where('masa_bakti', $masa);
    }

    if (!empty($jenis)) {
        $builder->where('jenis_surat', $jenis);
    }

    if (!empty($q)) {
        $builder->like('judul', $q);
    }

    $data['items'] = $builder
        ->orderBy('tanggal_surat', 'DESC')
        ->findAll();

    // ⬇️ PENTING DI SINI
    return view('pages/SuratEdaran', $data);
}




}