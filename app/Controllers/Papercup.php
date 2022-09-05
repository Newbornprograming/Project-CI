<?php

namespace App\Controllers;

use App\Models\PapercupModel;

class Papercup extends BaseController
{
    protected $papercupModel;
    public function __construct()
    {
        $this->papercupModel = new PapercupModel();
    }

    public function index()
    {

        $data =
            [
                'title' => 'Daftar Papercup',
                'papercup' => $this->papercupModel->getPapercup()
            ];

        return view('papercup/index', $data);
    }


    public function listbeli()
    {

        $data =
            [
                'title' => 'Pembelian Papercup',
                'papercup' => $this->papercupModel->getPapercup()
            ];

        return view('papercup/listbeli', $data);
    }

    public function detail($id)
    {
        $data =
            [
                'title' => 'Detail Papercup',
                'papercup' => $this->papercupModel->getPapercup($id)
            ];
        //jika komik tidak ada di url
        if (empty($data['papercup'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Papercup' . $id . 'tidak ditemukan.');
        }

        return view('papercup/detail', $data);
    }

    //fungsi untuk pindah ke halaman tambah dta
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Papercup',
            'validation' => \Config\Services::validation()
        ];

        return view('papercup/create', $data);
    }

    //fungsi menyimpan data setelah mengisi form
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                // 'rules' =>  'is_unique[papercup.judul]|required',
                'rules' =>  'required',
                'errors' => [
                    'required' => '{field} papercup tidak boleh kosong',
                    // 'is_unique' => '{field} papercup sudah ada'
                ]
            ],
            'stok' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => '{field} papercup tidak boleh kosong',
                ]
            ],
            'ukuran' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => '{field} papercup tidak boleh kosong',
                ]
            ],
            'kapasitas' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => '{field} papercup tidak boleh kosong',
                ]
            ],
            'harga' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => '{field} papercup tidak boleh kosong',
                ]
            ],
            'koleksi' => [
                'rules' =>  'max_size[koleksi,10240]|is_image[koleksi]|mime_in[koleksi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran file gambar terlalu besar',
                    'is_image' => 'file yang diupload bukan gambar',
                    'mime_in' => 'file yang diupload bukan gambar',
                ]
            ],

        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/papercup/create')->withInput();
        }

        //kelola gambar
        $fileKoleksi = $this->request->getFile('koleksi');
        //apakah tidak ada file yang diupload
        if ($fileKoleksi->getError() == 4) {
            $namaKoleksi = 'default.jpeg';
        } else {
            //generate nama foto supaya tidak sama
            $namaKoleksi = $fileKoleksi->getRandomName();

            //piindah file gambar ke folder publik dengan folder img
            $fileKoleksi->move('img', $namaKoleksi);
        }

        //ambil nama file jika ingin anam file sesuai dengan yang diupload
        //$fileKoleksi->move('img');
        // $namaKoleksi = $fileKoleksi->getName();

        $this->papercupModel->save([
            'judul' => $this->request->getVar('judul'),
            'stok' => $this->request->getVar('stok'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kapasitas' => $this->request->getVar('kapasitas'),
            'harga' => $this->request->getVar('harga'),
            'koleksi' => $namaKoleksi,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/papercup');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $papercup = $this->papercupModel->find($id);

        //cek apakah yng didelete ada default model kita
        if ($papercup['koleksi'] != 'default.jpeg') {
            //hapus gambar) 
            unlink('img/' . $papercup['koleksi']);
        }


        $this->papercupModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/papercup');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Papercup',
            'validation' => \Config\Services::validation(),
            'papercup' => $this->papercupModel->getPapercup($id),
        ];

        return view('papercup/edit', $data);
    }

    public function update($id)
    {
        // cek judul  inputan
        // $papercupLama = $this->papercupModel->getPapercup($this->request->getVar('id'));
        // if ($papercupLama['judul'] == $this->request->getVar('judul')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required|is_unique[papercup.judul]';
        // }

        // // validasi input
        // if (!$this->validate([
        //     'judul' => [
        //         'rules' =>  'is_unique[papercup.judul]|required',
        //         'errors' => [
        //             'required' => '{field} papercup tidak boleh kosong',
        //             'is_unique' => '{field} papercup sudah ada'
        //         ]
        //     ],
        //     'stok' => [
        //         'errors' => [
        //             'required' => '{field} papercup tidak boleh kosong',
        //         ]
        //     ],
        //     'ukuran' => [
        //         'rules' =>  'required',
        //         'errors' => [
        //             'required' => '{field} papercup tidak boleh kosong',
        //         ]
        //     ],
        //     'kapasitas' => [
        //         'rules' =>  'required',
        //         'errors' => [
        //             'required' => '{field} papercup tidak boleh kosong',
        //         ]
        //     ],
        //     'harga' => [
        //         'rules' =>  'required',
        //         'errors' => [
        //             'required' => '{field} papercup tidak boleh kosong',
        //         ]
        //     ],
        //     'koleksi' => [
        //         'rules' =>  'max_size[koleksi,10240]|is_image[koleksi]|mime_in[koleksi,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             'max_size' => 'ukuran file gambar terlalu besar',
        //             'is_image' => 'file yang diupload bukan gambar',
        //             'mime_in' => 'file yang diupload bukan gambar',
        //         ]
        //     ],

        // ])) 
        {

            // return redirect()->to('/papercup/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/papercup/create')->withInput();
        }

        // //mengganti judul komik lama
        // $fileKoleksi = $this->request->getFile('koleksi');
        // //cek gambar apakah tetap gambar lama
        // if ($fileKoleksi->getError() == 4) {
        //     $namaKoleksi = $this->request->getVar('koleksiLama');
        // } else {
        //     //generate nama foto supaya tidak sama
        //     $namaKoleksi = $fileKoleksi->getRandomName();

        //     //piindah file gambar ke folder publik dengan folder img
        //     $fileKoleksi->move('img', $namaKoleksi);

        //     //hapus file lama
        //     unlink('img/' . $this->request->getVar('koleksiLama'));
        // }

        $this->papercupModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'stok' => $this->request->getVar('stok'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kapasitas' => $this->request->getVar('kapasitas'),
            'harga' => $this->request->getVar('harga'),
            // 'koleksi' => $namaKoleksi,
            'koleksi' => $this->request->getVar('koleksi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/papercup');
    }
}
