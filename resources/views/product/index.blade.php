@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <h1 style="margin-bottom: 50px">Produk</h1>

        <a href="{{ route('product.create') }}" class="btn btn-primary"
            style="background-color:gray; border:none; float:right">Tambah Kategori</a>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
            style="margin-top: 50px; float:right">
            <div class="input-group" style="">
                <input class="form-control" type="text" placeholder="Cari..." aria-label="Cari..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">KATEGORI BARANG</th>
                    <th scope="col">PRODUK</th>
                    <th scope="col">STOK</th>
                    <th scope="col">HARGA JUAL</th>
                    <th scope="col">HARGA BELI</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody id="itemList">
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category->nama_kategori }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->harga_jual }}</td>
                        <td>{{ $item->harga_beli }}</td>
                        <td class="d-flex justify-content-beetwen">
                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning me-2">
                                Edit
                            </a>

                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-light"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- <script>
    function addItem() {
        var kategoriName = document.getElementById('kategoriName').value;
        var itemList = document.getElementById('itemList');
        var row = itemList.insertRow();
        
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);}
</script> --}}
@endsection
