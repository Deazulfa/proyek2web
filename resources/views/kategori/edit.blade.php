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
    <form method="POST" action="{{ route('category.update', $category) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="kategoriName">Nama Kategori:</label>
        <input type="text" id="kategoriName" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</div>
</div>
</main>


@endsection

