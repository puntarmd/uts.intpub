<?php

class About extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman AboutMe';
        $data['nama'] = 'Sepatu Store SS';
        $data['alamat'] = 'Jl. KimonoJaya 65 A';
        $data['no_hp'] = '0822 2390 9879 8988';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
