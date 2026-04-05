<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

// Route::get('/create', [OrderController::class,'createOrder'])->name('order.create');
Route::view ('/', 'index')->name('index');
Route::get('/pdf', [PDFController::class, 'index'])->name('pdf');
Route::get('pdf/download', [PDFController::class, 'download'])->name('downloadPDF');
