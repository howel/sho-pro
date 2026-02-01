<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProductDetail; // No olvides el import
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;


// Ruta normal
Route::get('/', Home::class)->name('home');

// Ruta con filtro de categoría
Route::get('/categoria/{slug}', Home::class)->name('category.show');

//ruta detalle producto
Route::get('/producto/{slug}', ProductDetail::class)->name('product.detail');

//ruta carrito resumen
Route::get('/carrito', CartPage::class)->name('cart');

//check de pagos
Route::get('/finalizar-compra', CheckoutPage::class)->name('checkout.form');

