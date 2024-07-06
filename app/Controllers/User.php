<?php

namespace App\Controllers;

class User extends BaseController
{
  public function index()
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $users = $this->userModel->findAll();
    $data = [
      "title" => "user",
      "users" => $users
    ];
    return view('user/index', $data);
  }

  public function create()
  {
    $data = [
      "name" => $this->request->getVar("name"),
      "telp" => $this->request->getVar("telp"),
      "address" => $this->request->getVar("address"),
    ];

    $createData = $this->userModel->insert($data);
    if ($createData) {
      session()->setFlashdata('success', 'User has been created');
    } else {
      session()->setFlashdata('failed', 'User has not been created');
    }
    return redirect()->to('/user');
  }

  public function detail($id)
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $user = $this->userModel->find($id);
    $data = [
      "title" => "user",
      "user" => $user
    ];
    return view('user/detail', $data);
  }

  public function update($id)
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    $user = $this->userModel->find($id);
    $data = [
      "title" => "user",
      "user" => $user
    ];

    return view('user/update', $data);
  }
  public function actionUpdate($id)
  {
    $data = [
      "name" => $this->request->getVar("name"),
      "telp" => $this->request->getVar("telp"),
      "address" => $this->request->getVar("address"),
    ];
    $updateData = $this->userModel->update($id, $data);

    if ($updateData) {
      session()->setFlashdata('success', 'User has been updated');
    } else {
      session()->setFlashdata('failed', 'User has not been updated');
    }
    return redirect()->to('/user/update/' . $id);
  }

  public function delete($id)
  {
    $deleteData = $this->userModel->delete($id);
    if ($deleteData) {
      session()->setFlashdata('success', 'User has been deleted');
    } else {
      session()->setFlashdata('failed', 'User has not been deleted');
    }
    return redirect()->to('/user');
  }
}
