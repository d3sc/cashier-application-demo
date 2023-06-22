<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderTransaction;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class TableKasir extends Component
{
    protected $listeners = ["userStore" => "render"];
    public $pembayaran;

    public function quantityIncrement($id, $productId)
    {
        $order = Order::find($id);
        $product = Product::find($productId);

        $harga_product = (int)$product->harga_product;
        $qty = (int)$order->quantity;
        Order::where('id', $id)->update([
            "quantity" => $qty + 1,
            "total_harga" => $harga_product * ($qty + 1),
        ]);
    }
    public function quantityDecrement($id, $productId)
    {
        $order = Order::find($id);
        $product = Product::find($productId);

        $harga_product = (int)$product->harga_product;
        $qty = (int)$order->quantity;
        Order::where('id', $id)->update([
            "quantity" => $qty - 1,
            "total_harga" => $harga_product * ($qty - 1),
        ]);
    }

    public function tambahan($value)
    {
        (int)$this->pembayaran += $value;
    }

    public function render()
    {
        return view('livewire.table-kasir', [
            "data" => Order::all(),
        ]);
    }

    public function submit()
    {
        $order = Order::get();

        $total_harga_order = 0;
        foreach ($order as $key => $value) {
            $total_harga_order += $value->total_harga;
        }
        if ($total_harga_order >= $this->pembayaran) {
            return redirect('/transaksi')->with('fail', 'transaksi gagal, uang kurang!!');
        }

        $kembalian = $this->pembayaran - $total_harga_order;

        $order =  OrderTransaction::create([
            "no_order" => "OD" . date("Ymd") . rand(1111, 9999),
            "nama_kasir" => auth()->user()->name,
        ]);

        $transaction = Order::get();

        foreach ($transaction as $key => $value) {
            $product = array(
                "order_id" => $order->id,
                "product_id" => $value->product_id,
                "quantity" => $value->quantity,
                "total_harga" => $value->total_harga,
                "grand_total" => $total_harga_order,
                "pembayaran" => $this->pembayaran,
                "kembalian" => $kembalian,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            );

            $orderProduct = OrderProduct::insert($product);
        }
        Order::truncate();
        return redirect('/transaksi')->to("/invoice/$order->no_order");
    }
}
