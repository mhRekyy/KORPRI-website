<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'slug'       => 'profile',
                'title'      => 'Profil KORPRI Aceh',
                'content'    => '<p>Profil KORPRI Aceh berisi informasi umum organisasi.</p>',
                'is_active'  => 1,
                'created_at'=> $now,
            ],
            [
                'slug'       => 'visi-misi',
                'title'      => 'Visi dan Misi',
                'content'    => '<p>Visi dan misi KORPRI Aceh.</p>',
                'is_active'  => 1,
                'created_at'=> $now,
            ],
            [
                'slug'       => 'tujuan_fungsi',
                'title'      => 'Tujuan dan Fungsi',
                'content'    => '<p>Tujuan dan fungsi KORPRI Aceh.</p>',
                'is_active'  => 1,
                'created_at'=> $now,
            ],
            [
                'slug'       => 'sejarah',
                'title'      => 'Sejarah',
                'content'    => '<p>Sejarah singkat KORPRI Aceh.</p>',
                'is_active'  => 1,
                'created_at'=> $now,
            ],
        ];

        $this->db->table('pages')->insertBatch($data);
    }
}
