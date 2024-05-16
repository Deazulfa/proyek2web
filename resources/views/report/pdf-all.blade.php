<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kegiatan</title>

    <style>
        /* Style for the content page */
        body {
            text-align: left;
            padding-top: 50px;
            font-size: 12px;
            font-family: 'Arial', serif;
            margin-bottom: 20px;
            margin-left: 30px;
            width: 80%;
            padding: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: 30px;
        }

        th,
        td {
            border: 1px solid rgb(44, 44, 44);
            padding: 8px;
            text-align: left;
        }

        h4{
            text-align: center;
        }
    </style>
</head>

<body>
    <h4>Laporan Pesanan Toko Indah Kayla</h4>
    <table class="table border">
        <thead>
            <tr>
                <th style="width: 10px">
                    No
                </th>
                <th style="width: 50px">
                    Kode Pesanan
                </th>
                <th style="width: 80px">
                    Tanggal Belanja
                </th>
                <th style="width: 150px">
                    Pesanan / QTY / Subtotal
                </th>
                <th style="width: 100px">
                    Total Pesanan
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasir as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pesanan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                    <td>
                        @forelse ($detailPesanan[$item->id] as $dp)
                            <ul>
                                <li>{{ $dp->product->nama_produk }} / {{ $dp->jumlah }} / Rp.{{ $dp->subtotal }}</li>
                            </ul>
                        @empty
                            <p>No details available.</p>
                        @endforelse
                    </td>
                    <td>
                        Rp.{{ $item->harga }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
