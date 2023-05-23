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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idStatus');
            $table->string('name');
            $table->string('surnames');
            $table->string('login');
            $table->string('password');
            $table->string('api_token',80)->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
            //
        });
        Schema::create('catStatus', function (Blueprint $table) {
            $table->increments('idUsuarios');
            $table->string('status',255);
            $table->integer('actiive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            Schema::dropIfExists('usuarios');
            });
    }
};
