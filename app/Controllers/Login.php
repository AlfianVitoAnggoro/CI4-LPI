<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
  protected $M_Login;
  protected $session;
  protected $helpers = ['form'];

  public function index()
  {
    $data = [
      'title' => 'login'
    ];
    return view('login/index', $data);
  }

  public function auth()
  {
    if (!$this->validate([
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Name must be filled'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Passwword must be filled'
        ]
      ]
    ])) {
      session()->setFlashdata('failed', 'Your Username or Password must be filled');
      return redirect()->to(base_url('login'))->withInput();
    }

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $cek = $this->adminModel->cek_login($username, $password);
    if (!empty($cek)) {
      $session_data = [
        'name' => $cek['name'],
        'username' => $cek['username'],
        'password' => $cek['password'],
        'is_login' => true
      ];
      $this->session->set($session_data);
      $this->session->setFlashdata('success', 'Login Success');
      return redirect()->to(base_url('dashboard'));
    } else {
      $this->session->setFlashdata('failed', 'Username or Password is failed');
      return redirect()->to(base_url('login'));
    }
  }

  public function logout()
  {
    $this->session->destroy();
    return redirect()->to(base_url('login'));
  }
}
