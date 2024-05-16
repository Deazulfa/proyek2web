@extends('layout.main');

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">INPUT PENJUALAN</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/input">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">ALARM RESTOCK</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">PENJUALAN HARI INI 
                        
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/penjualan">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div> 
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">PENJUALAN BULAN INI</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        GRAFIK PENJUALAN PER-BULAN
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        GRAFIK PENJUALAN PER-MINGGU
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        PENJUALAN HARI 
                        <a href="{{ route('today-print') }}" class="btn btn-primary"
                                style=" border:none; float:right" target="__blank">Cetak</a>
                    </div>
                    <div class="card-body">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">KODE PESANAN</th>
                                    <th scope="col">PESANAN/QTY/SUBTOTAL</th>
                                    <th scope="col">TOTAL PESANAN</th>
                                </tr>
                            </thead>
                            <tbody id="itemListHariIni">
                                @foreach ($kasirHariIni as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_pesanan }}</td>
                                        <td>
                                            @forelse ($detailPesananHariIni[$item->id] as $dp)
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
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        PENJUALAN BULAN INI
                        <a href="{{ route('cr-month-print') }}" class="btn btn-primary"
                                style=" border:none; float:right" target="__blank">Cetak</a>
                    </div>
                    <div class="card-body">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">KODE PESANAN</th>
                                    <th scope="col">PESANAN/QTY/SUBTOTAL</th>
                                    <th scope="col">TOTAL PESANAN</th>
                                </tr>
                            </thead>
                            <tbody id="itemListBulanIni">
                                @foreach ($kasirBulanIni as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_pesanan }}</td>
                                        <td>
                                            @forelse ($detailPesananBulanIni[$item->id] as $dp)
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
                </div>
            </div>
        </div>
    </div>
</main>
@endsection