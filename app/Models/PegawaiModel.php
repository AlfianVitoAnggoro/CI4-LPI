<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ResultInterface;

class PegawaiModel extends Model
{
  protected $table = "pegawai";
  protected $allowedFields = ['name', 'telp', 'address', 'field', 'photo'];
}
