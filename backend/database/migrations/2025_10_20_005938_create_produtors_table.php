<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->string('cpf_cnpj', 20)->unique();
            $table->string('telefone', 20)->nullable();
            $table->string('email', 255)->unique();
            $table->text('endereco')->nullable();
            $table->date('data_cadastro')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtores');
    }
};
