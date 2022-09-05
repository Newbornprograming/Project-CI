<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_admin') ? $this->request->getVar('page_admin') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $admin = $this->adminModel->search($keyword);
        } else {
            $admin = $this->adminModel;
        }

        $data =
            [
                'title' => 'Daftar Pelanggan',
                'admin' => $admin->paginate(5, 'admin'),
                'pager' => $this->adminModel->pager,
                'currentPage' => $currentPage

            ];

        return view('admin/index', $data);
    }
}
