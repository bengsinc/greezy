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
        Schema::create('configs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('user_id');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->string('logo')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('site')->nullable();
            $table->string('endereco')->nullable();
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
        Schema::dropIfExists('configs');
    }
};
