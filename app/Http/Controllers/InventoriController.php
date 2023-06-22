<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventory.index', [
            "data" => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nama_product" => "required|max:255",
            "harga_product" => "required|max:50"
        ]);

        Product::create($validation);

        return redirect('/inventori')->with('success-create', 'New Product has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $inventori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $inventori)
    {
        return view("inventory.product-edit", [
            "data" => $inventori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $inventori)
    {
        $validation = $request->validate([
            "nama_product" => "required|max:255",
            "harga_product" => "required|max:50"
        ]);

        Product::where('id', $inventori->id)->update($validation);

        return redirect('/inventori')->with('success', 'Product has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $inventori)
    {
        Product::destroy($inventori->id);
        return redirect('/inventori')->with('success', 'Product has been deleted!');
    }
}
