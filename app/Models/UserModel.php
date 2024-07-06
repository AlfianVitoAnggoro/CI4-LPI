<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ResultInterface;

class UserModel extends Model
{
  protected $table = "users";
  protected $allowedFields = ['name', 'telp', 'address'];
}
