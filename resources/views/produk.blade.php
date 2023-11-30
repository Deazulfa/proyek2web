@extends('layout.main')

@section('content')

<div class="container mt-5">
<h1 style="margin-bottom: 50px">List Barang</h1>

<a href="/form_produk" class="btn btn-primary" style="background-color:gray; border:none; float:right">Tambah Barang</a>
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="margin-top: 50px; float:right" >
    <div class="input-group" style="">
        <input class="form-control" type="text" placeholder="Cari..." aria-label="Cari..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
    </div>
</form>
<table class="table" >
    <thead>
        <tr>
            <th>KODE BARANG</th>
            <th>NAMA PRODUK/BARANG</th>
            <th>STOK</th>
            <th>HARGA JUAL</th>
            <th>HARGA BELI</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>kiki</td>
                <td>kiki</td>
                <td>kiki</td>
                <td>kiki</td>
                <td>kiki</td>
                <td>kiki</td>
            </tr>
            <tr>
            </tr>
    </tbody>
</table>
</div>

@endsection