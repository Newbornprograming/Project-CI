<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'role'];

    public function search($keyword)
    {
        return $this->table('admin')->like('nama', $keyword)->orLike('role', $keyword);
    }
}
