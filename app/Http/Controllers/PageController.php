<?php

namespace App\Http\Controllers;

use App\Models\OrderTransaction;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("dashboard.index");
    }

    public function search_invoice()
    {
        return view('search_invoice.index');
    }

    public function search_invoice_handler(Request $request)
    {
        $validation = $request->validate([
            'no_order' => 'required',
        ]);

        $no_order = $validation['no_order'];

        $order = OrderTransaction::where('no_order', $no_order)->first();
        if (!$order) return redirect('/search_invoice')->with('fail', 'No Order Not Found!');

        return redirect()->to("/invoice/$no_order");
    }
}
