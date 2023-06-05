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
        Schema::create('alert_details', function (Blueprint $table) {
            $table->id();
            $table->integer('alert_id');
            $table->string ('severidad');
            $table->string ('falsoPositivo');
            $table->string ('incidentesConfirmado');
            $table->string ('accionesCorrectivas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alert_details');
    }
};
