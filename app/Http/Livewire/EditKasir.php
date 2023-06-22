<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class EditKasir extends Component
{

    public $harga_product;
    public $data;
    public $product;
    public $quantity_product;
    public $total_harga;
    public $product_old;

    public function render()
    {
        return view('livewire.edit-kasir');
    }

    public function mount($product)
    {
        $this->data = Product::all();
        $this->product = $product->product_id;
        $this->harga_product = $product->product->harga_product;
        $this->quantity_product = $product->quantity;
        $this->product_old = $product;
        $this->total_harga = (int)$this->quantity_product * (int)$this->harga_product;
    }

    public function updated($name, $value)
    {
        if ($name == "product") {
            $harga = Product::find($value);
            $this->harga_product = $harga->harga_product;
            $this->total_harga = (int)$this->quantity_product * (int)$this->harga_product;
        }

        if ($name == "quantity_product") {
            $this->total_harga = (int)$this->quantity_product * (int)$this->harga_product;
        }
    }

    public function store()
    {
        $this->validate([
            'quantity_product' => 'required',
            'total_harga' => 'required'
        ]);

        if ($this->product != $this->product_old->product_id) {
            $this->validate([
                'product' => 'required|unique:orders,product_id',
            ]);
        }

        // dd("helo");
        // dd($this->product_old);

        Order::where('id', $this->product_old->id)->update([
            "product_id" => $this->product,
            "quantity" => $this->quantity_product,
            "total_harga" => $this->total_harga,
        ]);

        return redirect('/transaksi')->with('success', 'Product has been edited!');
    }
}
