<?php

namespace App\Http\Livewire;

// error_reporting(0);

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Mockery\Undefined;

use function Termwind\render;

class Kasir extends Component
{
    public $product;
    public $harga_product;

    public function mount($product)
    {
        $this->product = $product[0]->id;
        $this->harga_product = $product[0]->harga_product;
    }

    public function updated($name, $value)
    {
        if ($name == "product") {
            $harga = Product::find($value);
            $this->harga_product = $harga->harga_product;
        }
    }

    public function store()
    {
        $this->validate([
            'product' => 'required|unique:orders,product_id',
        ]);

        // dd($this->harga_product);

        Order::create([
            "product_id" => "$this->product",
            "quantity" => "1",
            "total_harga" => "$this->harga_product",
        ]);

        session()->flash('success', 'Product Berhasil Ditambahkan!');

        // //* Ketika fungsi diatas selesai dijalankan dan masuk ke fungsi emit, maka dia akan menjalankan $listeners yang ada di file UserTable.php
        $this->emit("userStore");
    }

    public function render()
    {
        return view('livewire.kasir', [
            "data" => Product::all(),
        ]);
    }
}
