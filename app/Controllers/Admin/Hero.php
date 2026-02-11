<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HeroModel;

class Hero extends BaseController
{
    protected $heroModel;

    public function __construct()
    {
        $this->heroModel = new HeroModel();
    }

    public function index()
    {
        $data['slides'] = $this->heroModel
                                ->orderBy('sort_order', 'ASC')
                                ->findAll();

        return view('admin/hero/index', $data);
    }

    public function create()
    {
        if ($this->heroModel->countAll() >= 5) {
            return redirect()->to('/admin/hero')
                ->with('error', 'Maksimal 5 slide diperbolehkan.');
        }

        return view('admin/hero/create');
    }

    public function store()
    {
        if ($this->heroModel->countAll() >= 5) {
            return redirect()->to('/admin/hero')
                ->with('error', 'Maksimal 5 slide diperbolehkan.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required|min_length[3]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/hero', $newName);

        $this->heroModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName,
            'sort_order'  => $this->request->getPost('sort_order')
        ]);

        return redirect()->to('/admin/hero')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['slide'] = $this->heroModel->find($id);

        return view('admin/hero/edit', $data);
    }

    public function update($id)
    {
        $slide = $this->heroModel->find($id);

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => $this->request->getPost('sort_order')
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/hero', $newName);

            if (file_exists(FCPATH . 'uploads/hero/' . $slide['image'])) {
                unlink(FCPATH . 'uploads/hero/' . $slide['image']);
            }

            $data['image'] = $newName;
        }

        $this->heroModel->update($id, $data);

        return redirect()->to('/admin/hero')->with('success', 'Slide berhasil diperbarui.');
    }

    public function delete($id)
    {
        $slide = $this->heroModel->find($id);

        if ($slide) {
            if (file_exists(FCPATH . 'uploads/hero/' . $slide['image'])) {
                unlink(FCPATH . 'uploads/hero/' . $slide['image']);
            }

            $this->heroModel->delete($id);
        }

        return redirect()->to('/admin/hero')->with('success', 'Slide berhasil dihapus.');
    }
}
