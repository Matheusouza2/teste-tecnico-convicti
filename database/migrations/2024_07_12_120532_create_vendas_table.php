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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->foreignId('vendedor')->constrained('users');
            $table->double('valor', 15, 2);
            $table->decimal('latitude', 15, 13);
            $table->decimal('longitude', 15, 13);
            $table->foreignId('unidade_venda')->nullable()->constrained('unidades');
            $table->foreignId('unidade_proxima')->nullable()->constrained('unidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
