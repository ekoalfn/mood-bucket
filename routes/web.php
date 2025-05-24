<?php

use App\Livewire\ProductFilter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');

Route::get('/produk/{product}', function (App\Models\Product $product) {
    return view('produk', ['product' => $product]);
})->name('produk');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/pemesanan', function () {
    return view('pemesanan');
})->name('pemesanan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');