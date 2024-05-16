@extends('layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <title>Input Data Barang</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #fff;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }

                    form {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        width: 300px;
                    }

                    label {
                        display: block;
                        margin-bottom: 8px;
                    }

                    input {
                        width: 100%;
                        padding: 8px;
                        margin-bottom: 16px;
                        box-sizing: border-box;
                    }

                    button {
                        background-color: #4caf50;
                        color: #fff;
                        padding: 10px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }

                    button:hover {
                        background-color: #45a049;
                    }
                </style>

                <body>
                    <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label for="kaetgoriBarang">KATEGORI BARANG</label>
                        <select name="category_id" id="" class="form-control mb-3">
                            <option value="" selected disabled>Pilih Kategori Barang</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" 
                                    {{ old('category_id', @$product->category_id) == $item->id ? 'selected' : '' }} >
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                        <label for="namabarang">NAMA PRODUK/BARANG</label>
                        <input type="text" id="namabarang" name="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" required>

                        <label for="stok">STOK</label>
                        <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', $product->stok) }}" required>

                        <label for="hargajual">HARGA JUAL</label>
                        <input type="text" id="hargajual" name="harga_jual" class="form-control" value="{{ old('harga_jual', $product->harga_jual) }}" required>

                        <label for="hargabeli">HARGA BELI</label>
                        <input type="text" id="hargabeli" name="harga_beli" class="form-control" value="{{ old('harga_beli', $product->harga_beli) }}" required>

                        {{-- <a class="btn btn-primary" type="submit" href="/produk">Submit</a> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </body>
            </div>
        </div>
    </main>

    {{-- <script>
        function addItem() {
            var kategoriName = document.getElementById('kategoriName').value;
            var itemList = document.getElementById('itemList');
            var row = itemList.insertRow();

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = kategoriName;
            document.getElementById('kategoriName').value = '';
        }
    </script> --}}
@endsection
