<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kasir;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $kasir = Kasir::get();
        $detailPesanan = [];

        if ($kasir->isNotEmpty()) {
            foreach ($kasir as $kasirs) {
                $kasirId = $kasirs->id;

                $detailPesanan[$kasirId] = DetailPesanan::where('kasir_id', $kasirId)->get();
            }
        }
        // $detailPesanan=DetailPesanan::where('kasir_id', @$kasir->id)->get();

        return view('report.index', [
            'kasir' => $kasir,
            'detailPesanan' => $detailPesanan
        ]);
    }

    public function printReport()
    {
        $kasir = Kasir::get();
        $detailPesanan = [];

        if ($kasir->isNotEmpty()) {
            foreach ($kasir as $kasirs) {
                $kasirId = $kasirs->id;

                $detailPesanan[$kasirId] = DetailPesanan::where('kasir_id', $kasirId)->get();
            }
        }

        $pdf=PDF::loadView(
            'report.pdf-all',
            [
                'kasir' => $kasir,
                'detailPesanan' => $detailPesanan
            ]
        )->setPaper('A4', 'potrait');

        return $pdf->stream();
    }
}
