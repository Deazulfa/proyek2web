<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kasir;
use App\Models\Notification;
use App\Models\Product;
use App\Notifications\StokNotification;
use App\Services\WhatsappGatewayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;

class KasirController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('kasir.index', [
            'product' => $product
        ]);
    }

    public function getProdukId($id)
    {
        $product = Product::find($id);

        return response()->json(['harga_jual' => $product->harga_jual]);
    }

    public function pesanan(Request $request)
    {
        DB::beginTransaction();

        try {
            $kasir = Kasir::create([
                'harga' => array_sum($request->subtotal),
            ]);

            $kasir->update([
                'kode_pesanan' => 'DP0' . $kasir->id,
            ]);

            foreach ($request->product_id as $key => $productId) {
                $jumlahPesanan = $request->jumlah[$key];
                $subtotal = $request->subtotal[$key];

                DetailPesanan::create([
                    'kasir_id' => $kasir->id,
                    'product_id' => $productId,
                    'jumlah' => $jumlahPesanan,
                    'subtotal' => $subtotal,
                ]);

                $product = Product::find($productId);
                $updatedRows = $product->decrement('stok', $jumlahPesanan);

                if ($updatedRows > 0 && $product->stok < 10) {
                    $phone = '6285295323574';
                    $message = 'Perhatian! Stok produk ' . $product->nama_produk . ' kurang dari 10.';
                    auth()->user()->notify(new StokNotification($phone, $message));

                    Notification::create([
                        'message' => $message
                    ]);
                }
            }
            DB::commit();

            return redirect()->route('nota', $kasir->id);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error($e);

            return redirect()->back()->with('error', 'Failed to process the order. Please try again.');
        }
    }

    public function nota($id)
    {
        $kasir = Kasir::find($id);
        $detailPesanan = DetailPesanan::where('kasir_id', $id)->get();

        $pdf = PDF::loadView('kasir.nota', [
            'kasir' => $kasir,
            'detailPesanan' => $detailPesanan
        ]);

        return $pdf->download();
    }
}
