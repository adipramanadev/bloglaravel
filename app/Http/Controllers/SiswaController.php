<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //berfungsi tempat untuk membuat logika aplikasi

    public function index()
    {
        return '<h1>Hello World, Controller</h1>';
    }

    public function jurusan($jurusan)
    {
        return 'Jurusan saya adalah ' . $jurusan;
    }

    public function mapel()
    {
        //variabel 
        $mapel = ["PBO","web", "android","Iot"];
        foreach ($mapel as $data) {
            return $data[2]; 
        }
       
    }

    
}
