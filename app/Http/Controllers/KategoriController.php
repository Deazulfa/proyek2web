<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama = $request->input('nama_kategori');
        $kategori->save();

        return redirect()->back()->with('success', 'Kategori barang berhasil disimpan');
    }

}
