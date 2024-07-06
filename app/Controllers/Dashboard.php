<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
  public function index()
  {
    $is_login = session()->get('is_login');
    if (!$is_login) {
      session()->setFlashdata('failed', 'You must login first');
      return redirect()->to(base_url('/login'));
    }

    session();
    $data = [
      "title" => "dashboard",
    ];
    return view('dashboard/index', $data);
  }
}
