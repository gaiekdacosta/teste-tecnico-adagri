<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rebanhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('especie', 100);
            $table->integer('quantidade')->default(0);
            $table->string('finalidade', 100)->nullable();
            $table->date('data_atualizacao')->nullable();
            $table->foreignId('propriedade_id')
                ->constrained('propriedades')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rebanhos');
    }
};
