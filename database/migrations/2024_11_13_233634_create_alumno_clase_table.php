<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumno_clase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('formulario_clase_id');
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('formulario_clase_id')->references('id')->on('formulario_clases')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumno_clase');
    }
};
