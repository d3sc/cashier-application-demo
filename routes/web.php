<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return redirect()->to("/login");
});

Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [PageController::class, "index"]);
    Route::get("/search_invoice", [PageController::class, "search_invoice"]);
    Route::post("/search_invoice", [PageController::class, "search_invoice_handler"]);
    Route::resource('/inventori', InventoriController::class);
    Route::get('/transaksi', [KasirController::class, "index"]);
    Route::get('/invoice/{no_order}', [KasirController::class, "invoice"]);

    Route::delete('/transaksi/delete/all', [KasirController::class, "deleteAll"]);
    Route::delete('/transaksi/{id}', [KasirController::class, "delete"]);

    Route::get('/transaksi/{order}', [KasirController::class, "show"]);

    Route::get("/logout", [AuthController::class, "logoutHandler"]);
});

Route::middleware(['guest'])->group(function () {
    Route::get("login", [AuthController::class, "loginPage"])->name('login');
    Route::post("login", [AuthController::class, "loginHandler"]);
});
