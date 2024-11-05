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
    Schema::create('formulario_clases', function (Blueprint $table) {
        $table->id();
        $table->string('class_name');
        $table->string('class_code');
        $table->text('class_description');
        $table->timestamps();

        $table->unsignedBigInteger('profesor_id');
        $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('formulario_clases');
}
};
