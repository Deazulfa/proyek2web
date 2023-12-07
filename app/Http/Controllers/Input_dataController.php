<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Input_dataController extends Controller
{
    public function main()
    {
       
        //render view with posts
        return view('input_data', compact('input_data'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('input_data');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $input_data = new Kategori();
        $input_data->nama_barang = $request->input('nama_barang');
        $input_data->harga_barang = $request->input('harga_barang');
        $input_data->stock_barang = $request->input('stock_barang');

        $input_data->save();

        //redirect to index
        return redirect()->route('input_data')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}