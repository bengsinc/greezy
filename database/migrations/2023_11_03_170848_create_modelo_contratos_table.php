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
        Schema::create('modelo_contratos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('user_id');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->text('conteudo')->nullable();
            $table->string('status')->default('ativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelo_contratos');
    }
};
