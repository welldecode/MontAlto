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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rg')->nullable();
            $table->string('cpf');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); // veículo
            $table->date('pickup_date');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
