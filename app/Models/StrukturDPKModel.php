<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturDPKModel extends Model
{
    protected $table = 'struktur_dpk';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'parent_id',   // 🔹 ditambahkan
        'jabatan',
        'nama',
        'level',
        'urutan',
        'is_active'
    ];

    protected $useTimestamps = true;
    protected $returnType = 'array';

    // =========================
    // EXISTING (JANGAN DIUBAH)
    // =========================
    public function getByLevel(int $level)
    {
        return $this->where('level', $level)
                    ->where('is_active', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    // =========================
    // ADMIN ONLY (BARU)
    // =========================
    public function getTree()
    {
        $data = $this->orderBy('urutan', 'ASC')->findAll();
        return $this->buildTree($data);
    }

    private function buildTree(array $items, $parentId = null)
    {
        $branch = [];

        foreach ($items as $item) {
            if ($item['parent_id'] == $parentId) {
                $children = $this->buildTree($items, $item['id']);
                if ($children) {
                    $item['children'] = $children;
                }
                $branch[] = $item;
            }
        }

        return $branch;
    }

    public function hasChildren($id)
{
    return $this->where('parent_id', $id)->countAllResults() > 0;
}

public function getAllWithParent()
{
    return $this->select('struktur_dpk.*, parent.jabatan AS parent_jabatan, parent.nama AS parent_nama')
                ->join('struktur_dpk parent', 'parent.id = struktur_dpk.parent_id', 'left')
                ->orderBy('struktur_dpk.level', 'ASC')
                ->orderBy('struktur_dpk.urutan', 'ASC')
                ->findAll();
}


}

