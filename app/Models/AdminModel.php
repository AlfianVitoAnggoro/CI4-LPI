<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

  protected $table            = 'admin';
  protected $allowedFields    = ['name', 'username', 'password'];

  public function cek_login($username, $password)
  {
    $query = $this->db->query('SELECT * FROM admin WHERE username = \'' . $username . '\' AND password = \'' . $password . '\'');
    return $query->getRowArray();
  }
}
