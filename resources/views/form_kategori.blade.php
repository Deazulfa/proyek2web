@extends('layout.main')

@section('content')
    <title>Kategori Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Kategori Barang</h2>
    <form action="proses_form.php" method="post">

        <label for="nama_barang">Nama Kategori:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <button type="submit">Submit</button>
    </form>

@endsection
