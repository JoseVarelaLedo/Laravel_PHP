<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notes', function(Blueprint $table){
            $table ->string ('author'); //añadir columna
            $table ->dropColumn(['deadline']); //borrar columna, se le pasa un array con las que se van a borrar
        });
    }

    /**
     * Reverse the migrations.
     */
    /* En este down el rollback no implica el borrado
    de la tabla, sino sólo de la columna creada en la
    actualización
    */
    public function down(): void
    {
        Schema::dropColumn(['author']);
    }
};
