<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('propriedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->string('municipio', 100);
            $table->string('uf', 2);
            $table->string('inscricao_estadual', 30)->unique();
            $table->decimal('area_total', 10, 2)->nullable();
            $table->foreignId('produtor_id')
                ->constrained('produtores')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propriedades');
    }
};
