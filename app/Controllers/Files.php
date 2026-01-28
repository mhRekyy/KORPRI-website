<?php

namespace App\Controllers;

class Files extends BaseController
{
    public function show($name)
    {
        $name = basename($name);
        $path = FCPATH . 'assets/pdf/' . $name;

        if (!is_file($path)) {
            return $this->response->setStatusCode(404);
        }

        // Paksa content benar-benar dikirim dan tidak di-cache jadi aneh
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="'.$name.'"')
            ->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->setHeader('Pragma', 'no-cache')
            ->setHeader('X-Content-Type-Options', 'nosniff')
            ->setBody(file_get_contents($path));
    }
}
