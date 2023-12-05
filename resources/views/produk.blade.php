@extends('layout.main')

@section('content')

<div class="container mt-5">
<h1 style="margin-bottom: 50px">List Kategori Barang</h1>

<a href="/form_produk" class="btn btn-primary" style="background-color:gray; border:none; float:right">Tambah Kategori</a>
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="margin-top: 50px; float:right" >
    <div class="input-group" style="">
        <input class="form-control" type="text" placeholder="Cari..." aria-label="Cari..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
    </div>
</form>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">KODE BARANG</th>
            <th scope="col">NAMA PRODUK/KATEGORI</th>
            <th scope="col">STOK</th>
            <th scope="col">HARGA JUAL</th>
            <th scope="col">HARGA BELI</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    <tbody id="itemList"></tbody>
</table>
</div>
<script>
    function addItem() {
        var kategoriName = document.getElementById('kategoriName').value;
        var itemList = document.getElementById('itemList');
        var row = itemList.insertRow();
        
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);}
</script>

@endsection