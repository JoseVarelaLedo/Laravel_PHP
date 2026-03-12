<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PostController;

//ruta general, controlada desde la clase NoteController, mediante la función index()
Route::get('note', [NoteController::class, 'index'])->name('note.index');
//ruta para creación de notas mediante formulario
Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
//ruta post para el guardado de datos
Route::post('note/store', [NoteController::class, 'store'])->name('note.store');
//ruta para actualización de notas mediante formulario; el parámetro es la propia nota
Route::get('note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
//ruta para guardar las actualizaciones
Route::put('note/update/{note}', [NoteController::class, 'update'])->name('note.update');
//ruta para mostrar la nota al completo
Route::get('note/show/{note}', [NoteController::class, 'show'])->name('note.show');
//ruta para el borrado de notas
Route::delete('note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');


//rutas Resource para los posts del blog
Route::resource('/post', PostController::class);