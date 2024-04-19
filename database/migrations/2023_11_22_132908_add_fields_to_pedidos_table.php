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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('observacao')->nullable();
            $table->string('orcamento')->nullable();
            $table->string('investimento')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('nome')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('formulario_id')->nullable();
            $table->string('cliente_id')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            //
        });
    }
};
