<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageController;

//rutele pentru paginile publice

Route::get('/',[PageController::class, 'homePage'])->name('home');
Route::get('/shop',[PageController::class, 'shopPage'])->name('shop');
Route::get('/detail',[PageController::class, 'productPage'])->name('product');
Route::get('/contact',[PageController::class, 'contactPage'])->name('contact');
Route::get('/cart',[PageController::class, 'cartPage'])->name('cart');
Route::get('/check',[PageController::class, 'checkPage'])->name('check');
