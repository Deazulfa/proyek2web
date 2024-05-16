<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kasir;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $kasirHariIni = Kasir::whereDate('created_at', $today)->get();
        $detailPesananHariIni = DetailPesanan::whereIn('kasir_id', $kasirHariIni->pluck('id'))->get()->groupBy('kasir_id');

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $kasirBulanIni = Kasir::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $detailPesananBulanIni = DetailPesanan::whereIn('kasir_id', $kasirBulanIni->pluck('id'))->get()->groupBy('kasir_id');

        return view('home', [
            'kasirHariIni' => $kasirHariIni,
            'detailPesananHariIni' => $detailPesananHariIni,
            'kasirBulanIni' => $kasirBulanIni,
            'detailPesananBulanIni' => $detailPesananBulanIni,
        ]);
    }

    public function todayPrint()
    {
        $today = Carbon::today();
        $kasirHariIni = Kasir::whereDate('created_at', $today)->get();
        $detailPesananHariIni = DetailPesanan::whereIn('kasir_id', $kasirHariIni->pluck('id'))->get()->groupBy('kasir_id');

        $pdf=PDF::loadView(
            'report.today-pdf',
            [
                'kasirHariIni' => $kasirHariIni,
                'detailPesananHariIni' => $detailPesananHariIni,
            ]
        )->setPaper('A4', 'potrait');

        return $pdf->stream();
    }

    public function currentMonth()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $kasirBulanIni = Kasir::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $detailPesananBulanIni = DetailPesanan::whereIn('kasir_id', $kasirBulanIni->pluck('id'))->get()->groupBy('kasir_id');

        $pdf=PDF::loadView(
            'report.cr-month-pdf',
            [
                'kasirBulanIni' => $kasirBulanIni,
                'detailPesananBulanIni' => $detailPesananBulanIni,
            ]
        )->setPaper('A4', 'potrait');

        return $pdf->stream();
    }

    public function getNotification()
    {
        $notification=Notification::get()->take(5);

        return response()->json($notification);
    }
}
