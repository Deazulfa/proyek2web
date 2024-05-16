@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <h1 style="margin-bottom: 50px">Report</h1>

        <a href="{{ route('print-all-report') }}" class="btn btn-primary"
            style="background-color:gray; border:none; float:right" target="__blank">Cetak</a>
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
                    <th scope="col">KODE PESANAN</th>
                    <th scope="col">TANGGAL BELANJA</th>
                    <th scope="col">PESANAN/QTY/SUBTOTAL</th>
                    <th scope="col">TOTAL PESANAN</th>
                </tr>
            </thead>
            <tbody id="itemList">
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
