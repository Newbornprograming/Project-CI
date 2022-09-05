<?php

namespace App\Models;

use CodeIgniter\Model;

class PapercupModel extends Model
{
    protected $table      = 'papercup';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'stok', 'ukuran', 'kapasitas', 'harga', 'koleksi'];

    public function getPapercup($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
