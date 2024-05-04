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
        Schema::create('financiaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('cuotas',2);
            $table->string('estado',20)->default('solicitado');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cod_auto');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('clientes');
            $table->foreign('cod_auto')->references('id')->on('autos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financiaciones');
    }
};
