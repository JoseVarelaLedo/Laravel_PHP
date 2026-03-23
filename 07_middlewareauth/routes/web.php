<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use Illuminate\Foundation\Testing\WithoutMiddleware;

Route::get ('/', [ExampleController::class, 'index']);
Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');

// Route::middleware(['example'])->group(
//     Route::get ('/', [ExampleController::class, 'index']),
//     //a la ruta siguiente no se le aplica el middleware admin
//     //Route::get ('/otra-ruta', [ExampleController::class, 'index'])->withoutMiddleware('admin'),
//     //resto de rutas a agrupar con el mismo middleware
// );