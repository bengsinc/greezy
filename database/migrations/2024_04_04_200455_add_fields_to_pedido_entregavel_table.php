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
        Schema::table('pedido_entregavel', function (Blueprint $table) {
            $table->string('nome')->nullable();
            $table->string('descricao')->nullable();
            $table->ulid('servico_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedido_entregavel', function (Blueprint $table) {
            //
        });
    }
};
