<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Home | Web',
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Web',
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Web',
            'alamat' =>
            [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'JL Perumahan Bumi Anggrek',
                    'kota' => 'Serang',
                    'telp' => '081234567890',
                    'email' => 'Papercuphome.gmail.net'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'JL Kalicari IV A',
                    'kota' => 'Semarang',
                    'telp' => '083853549899',
                    'email' => 'Papercupntework.gmail.net'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
