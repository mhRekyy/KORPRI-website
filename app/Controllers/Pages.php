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
}
