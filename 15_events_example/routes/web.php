<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/create', [OrderController::class,'create'])->name('order.create');
