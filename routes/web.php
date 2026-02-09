<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProductDetail;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Http\Controllers\ProductController;

// Ruta principal
Route::get('/', Home::class)->name('home');

// Ruta con filtro de categoría
Route::get('/categoria/{slug}', Home::class)->name('category.show');

// Ruta detalle producto (Asegúrate de que en tus componentes uses route('product.detail', ...))
Route::get('/producto/{slug}', ProductDetail::class)->name('product.detail');

// Ruta carrito resumen
Route::get('/carrito', CartPage::class)->name('cart');

// --- EL CAMBIO ESTÁ AQUÍ ---
// Cambiamos 'checkout.form' por 'checkout' para que coincida con los controladores
Route::get('/finalizar-compra', CheckoutPage::class)->name('checkout');



Route::get('/tienda', [ProductController::class, 'index'])->name('tienda');

Route::view('/nosotros', 'pages.about')->name('about');
Route::view('/servicios', 'pages.services')->name('services');
Route::view('/contacto', 'pages.contact')->name('contact');