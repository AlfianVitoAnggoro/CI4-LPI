<?php

namespace App\Controllers;

class Pegawai extends BaseController
{


  public function index()
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $pegawai = $this->pegawaiModel->findAll();
    $data = [
      "title" => "pegawai",
      "pegawai" => $pegawai
    ];
    return view('pegawai/index', $data);
  }

  public function create()
  {
    if (!$this->validate([
      'photo' => [
        'rules' => 'uploaded[photo]|max_size[photo,300]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg]',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu',
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
    ])) {
      session()->setFlashdata('failed', 'Your photo is not valid');
      return redirect()->back()->withInput();
    }
    // ambil foto 
    $photo = $this->request->getFile('photo');
    // apakah tidak ada foto yang diupload
    if ($photo->getError() == 4) {
      session()->setFlashdata('failed', 'your photo is not uploaded');
      return redirect()->back();
    } else {
      // generate nama file random
      $photoName = $photo->getRandomName();

      $data = [
        "name" => $this->request->getVar("name"),
        "telp" => $this->request->getVar("telp"),
        "address" => $this->request->getVar("address"),
        "field" => $this->request->getVar("field"),
        "photo" => $photoName,
      ];

      $createData = $this->pegawaiModel->insert($data);
      if ($createData) {
        // pindahkan file ke folder img
        $photo->move('img/photo', $photoName);
        session()->setFlashdata('success', 'Pegawai has been created');
      } else {
        session()->setFlashdata('failed', 'Pegawai has not been created');
      }
      return redirect()->to(base_url('pegawai'));
    }
  }

  public function detail($id)
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $pegawai = $this->pegawaiModel->find($id);
    $data = [
      "title" => "pegawai",
      "pegawai" => $pegawai
    ];
    return view('pegawai/detail', $data);
  }

  public function update($id)
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $pegawai = $this->pegawaiModel->find($id);
    $data = [
      "title" => "pegawai",
      "pegawai" => $pegawai
    ];

    return view('pegawai/update', $data);
  }
  public function actionUpdate($id)
  {
    if (!$this->validate([
      'photo' => [
        'rules' => 'uploaded[photo]|max_size[photo,300]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg]',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu',
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
    ])) {
      session()->setFlashdata('failed', 'Your photo is not valid');
      return redirect()->back()->withInput();
    }

    $photo = $this->request->getFile('photo');

    if ($photo->getError() == 4) {
      session()->setFlashdata('failed', 'your photo is not uploaded');
      return redirect()->back();
    } else {
      // generate nama file random
      $photoName = $photo->getRandomName();

      $data = [
        "name" => $this->request->getVar("name"),
        "telp" => $this->request->getVar("telp"),
        "address" => $this->request->getVar("address"),
        "field" => $this->request->getVar("field"),
        "photo" => $photoName,
      ];

      $updateData = $this->pegawaiModel->update($id, $data);

      if ($updateData) {
        // pindahkan file ke folder img
        $photo->move('img/photo', $photoName);
        session()->setFlashdata('success', 'Pegawai has been updated');
      } else {
        session()->setFlashdata('failed', 'Pegawai has not been updated');
      }
      return redirect()->to('/pegawai/update/' . $id);
    }
  }

  public function delete($id)
  {
    $deleteData = $this->pegawaiModel->delete($id);
    if ($deleteData) {
      session()->setFlashdata('success', 'Pegawai has been deleted');
    } else {
      session()->setFlashdata('failed', 'Pegawai has not been deleted');
    }
    return redirect()->to('/pegawai');
  }
}
