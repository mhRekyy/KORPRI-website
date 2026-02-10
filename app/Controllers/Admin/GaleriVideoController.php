<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriVideoModel;

class GaleriVideoController extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new GaleriVideoModel();
        helper('admin_log');
    }

    /* ===============================
       INDEX
    ================================ */
    public function index()
    {
        return view('admin/galeri/video/index', [
            'pageTitle' => 'Galeri Video Kegiatan',
            'videos'    => $this->videoModel->getAll(),
        ]);
    }

    /* ===============================
       CREATE
    ================================ */
    public function create()
    {
        return view('admin/galeri/video/create', [
            'pageTitle' => 'Tambah Video Kegiatan',
        ]);
    }

    /* ===============================
       STORE
    ================================ */
    public function store()
    {
        $rules = [
            'youtube_url' => 'required|valid_url',
            'description' => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $youtubeUrl = trim($this->request->getPost('youtube_url'));
        $videoId    = $this->extractYoutubeId($youtubeUrl);

        if (! $videoId) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'URL YouTube tidak valid.');
        }

        $meta = $this->fetchYoutubeMeta($videoId);

        if (! $meta) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengambil data video YouTube.');
        }

        $this->videoModel->insert([
            'youtube_url'       => $youtubeUrl,
            'youtube_video_id'  => $videoId,
            'youtube_title'     => $meta['title'],
            'thumbnail_url'     => $meta['thumbnail'],
            'description'       => $this->request->getPost('description'),
            'created_at'        => date('Y-m-d H:i:s'),
        ]);

        $newId = $this->videoModel->getInsertID();

        // ✅ LOG TAMBAH VIDEO
        admin_log(
            'create',
            '[GALERI VIDEO] Tambah video: ' . $meta['title'],
            $newId
        );

        return redirect()->to('/admin/galeri/video')
            ->with('success', 'Video berhasil ditambahkan.');
    }

    /* ===============================
       EDIT
    ================================ */
    public function edit($id)
    {
        $video = $this->videoModel->getById($id);

        if (! $video) {
            return redirect()->to('/admin/galeri/video')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/galeri/video/edit', [
            'pageTitle' => 'Edit Video Kegiatan',
            'video'     => $video,
        ]);
    }

    /* ===============================
       UPDATE
    ================================ */
    public function update($id)
    {
        $video = $this->videoModel->getById($id);

        if (! $video) {
            return redirect()->to('/admin/galeri/video')
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'youtube_url' => 'required|valid_url',
            'description' => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $youtubeUrl = trim($this->request->getPost('youtube_url'));

        $dataUpdate = [
            'description' => $this->request->getPost('description'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        $logDescription = '[GALERI VIDEO] Update deskripsi video: ' . $video['youtube_title'];

        // Jika URL berubah → update metadata
        if ($youtubeUrl !== $video['youtube_url']) {

            $videoId = $this->extractYoutubeId($youtubeUrl);

            if (! $videoId) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'URL YouTube tidak valid.');
            }

            $meta = $this->fetchYoutubeMeta($videoId);

            if (! $meta) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengambil data video YouTube.');
            }

            $dataUpdate['youtube_url']      = $youtubeUrl;
            $dataUpdate['youtube_video_id'] = $videoId;
            $dataUpdate['youtube_title']    = $meta['title'];
            $dataUpdate['thumbnail_url']    = $meta['thumbnail'];

            $logDescription = '[GALERI VIDEO] Update URL & metadata video: ' . $meta['title'];
        }

        $this->videoModel->update($id, $dataUpdate);

        // ✅ LOG UPDATE VIDEO
        admin_log(
            'update',
            $logDescription,
            $id
        );

        return redirect()->to('/admin/galeri/video')
            ->with('success', 'Video berhasil diperbarui.');
    }

    /* ===============================
       DELETE
    ================================ */
    public function delete($id)
    {
        $video = $this->videoModel->getById($id);

        if (! $video) {
            return redirect()->to('/admin/galeri/video')
                ->with('error', 'Data tidak ditemukan.');
        }

        $this->videoModel->delete($id);

        // ✅ LOG HAPUS VIDEO
        admin_log(
            'delete',
            '[GALERI VIDEO] Hapus video: ' . ($video['youtube_title'] ?? '-'),
            $id
        );

        return redirect()->to('/admin/galeri/video')
            ->with('success', 'Video berhasil dihapus.');
    }

    /* =========================================================
       HELPER: Extract YouTube Video ID
    ========================================================== */
    private function extractYoutubeId($url)
    {
        if (preg_match('~youtu\.be/([^\?&]+)~', $url, $m)) {
            return $m[1];
        }

        if (preg_match('~v=([^\?&]+)~', $url, $m)) {
            return $m[1];
        }

        return null;
    }

    /* =========================================================
       HELPER: Fetch YouTube Metadata (NO API KEY)
    ========================================================== */
    private function fetchYoutubeMeta($videoId)
    {
        $oembedUrl = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v='
            . $videoId . '&format=json';

        $context = stream_context_create([
            'http' => [
                'timeout' => 5,
            ]
        ]);

        $json = @file_get_contents($oembedUrl, false, $context);

        if (! $json) {
            return null;
        }

        $data = json_decode($json, true);

        if (! isset($data['title'])) {
            return null;
        }

        return [
            'title'     => $data['title'],
            'thumbnail' => 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg',
        ];
    }
}
