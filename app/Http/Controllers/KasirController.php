<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\Product;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view("kasir.index", [
            "data" => Product::all(),
        ]);
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/transaksi')->with('success', 'pesanan Berhasil Dihapus!');
    }

    public function deleteAll()
    {
        Order::truncate();

        return redirect('/transaksi')->with('success', 'semua pesanan Berhasil Dihapus!');
    }

    public function show(Order $order)
    {
        return view("kasir.edit-kasir", [
            "data" => $order,
        ]);
    }

    public function invoice($no_order)
    {
        $order = OrderTransaction::with('orderProduct')->where('no_order', $no_order)->first();
        if (!$order) return redirect()->to('/transaksi');

        return view('kasir.invoice', compact('order'));
    }
}
