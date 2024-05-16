<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::all();

        return view('product.index', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();

        return view('product.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product=Product::find($product->id);
        $category=Category::all();

        return view('product.edit', [
            'product' => $product,
            'category' => $category
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = [
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli
        ];

        Product::where('id', $product->id)->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product=Product::find($product->id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
