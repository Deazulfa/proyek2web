@extends('layout.main')

@section('content')

<div class="container mt-5">
<h1 style="margin-bottom: 50px">List Kategori Barang</h1>

<a href="/form_kategori" class="btn btn-primary" style="background-color:gray; border:none; float:right">Tambah Kategori</a>
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="margin-top: 50px; float:right" >
    <div class="input-group" style="">
        <input class="form-control" type="text" placeholder="Cari..." aria-label="Cari..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
    </div>
</form>
<table class="table" >
    <thead>
        <tr>
            <th>KODE KATEGORI</th>
            <th>NAMA KATEGORI BARANG</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>kiki </td>
                <td>kiki</td>
                <td>kiki</td>
            </tr>
            <tr>
            </tr>
    </tbody>
</table>
</div>

@endsection