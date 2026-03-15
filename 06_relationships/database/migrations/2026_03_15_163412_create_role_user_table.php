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
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            //realmente sólo necesitamos los dos identificadores implicados en la relación
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            //información añadida
            $table->string ('added_by')->nullable(); //opcional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
