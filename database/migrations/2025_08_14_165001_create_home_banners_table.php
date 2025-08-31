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
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('imagem_path')->nullable(); // storage path
            $table->text('descricao')->nullable();
            $table->json('beneficios')->nullable(); // ["Qualidade","Segurança","Menor preço"]
            $table->string('botao_label')->nullable();
            $table->string('botao_url')->nullable();
            $table->string('bg_color')->nullable();   // ex: #0e7490
            $table->string('text_color')->nullable(); // ex: #ffffff
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};
