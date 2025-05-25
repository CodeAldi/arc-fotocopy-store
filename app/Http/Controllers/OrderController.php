<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index() {
        $keranjang = Keranjang::where('user_id', Auth()->user()->id)->get();
        $order = Order::where('user_id', Auth()->user()->id)->get();
        return view('landing.bayar',[
            'keranjang'=>$keranjang,
            'order'=>$order,
        ]);
    }
    function store() {
        $keranjang = Keranjang::where('user_id', Auth()->user()->id)->get();
        $totalbayar = 0;
        foreach ($keranjang as $key => $value) {
            $totalbayar = $totalbayar + ($value->barang->hargaBarang * $value->jumlah);
        }
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalbayar,
            )
        );
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $snapToken = Snap::getSnapToken($params);

        $order = new Order();
        $order->user_id = Auth()->user()->id;
        $order->total_bayar = $totalbayar;
        $order->snap_token = $snapToken;
        $order->save();
        return redirect()->route('checkout.bayar');

    }
}
