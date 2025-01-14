@extends('layout.main');

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
    <form>
        <label for="productName">Nama Barang:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="productDescription">Harga Barang:</label>
        <input type="text" id="productDescription" name="productDescription" required>

        <label for="productQuantity">Stock:</label>
        <input type="number" id="productQuantity" name="productQuantity" required>

        <button type="submit">Submit</button>
    </form>
</body>
</div>
</div>
</main>
@endsection
