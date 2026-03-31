<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/create', [OrderController::class,'createOrder'])->name('order.create');
