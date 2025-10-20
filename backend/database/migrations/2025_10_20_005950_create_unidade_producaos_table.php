<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('unidades_producao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_cultura', 150);
            $table->decimal('area_total_ha', 10, 2)->nullable();
            $table->string('coordenadas_geograficas', 50)->nullable();
            $table->foreignId('propriedade_id')
                ->constrained('propriedades')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades_producao');
    }
};
