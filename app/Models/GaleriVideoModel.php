<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriVideoModel extends Model
{
    protected $table      = 'galeri_video';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'youtube_url',
        'youtube_video_id',
        'youtube_title',
        'thumbnail_url',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false;

    /**
     * Ambil semua video (terbaru dulu)
     */
    public function getAll()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Ambil satu video by ID
     */
    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
}
