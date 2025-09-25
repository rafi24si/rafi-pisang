<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Fungsi untuk menampilkan matakuliah berdasarkan kode
    public function show($kodeMatakuliah = null)
    {
        if ($kodeMatakuliah) {
            return "Anda mengakses matakuliah " . $kodeMatakuliah;
        } else {
            return "Masukkan kode matakuliah!";
        }
    }
}
