<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snort', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp')->nullable();
            $table->unsignedInteger('sig_id');
            $table->string('sig_name');
            $table->string('protocol');
            $table->string('src_ip');
            $table->unsignedInteger('src_port');
            $table->string('dest_ip');
            $table->unsignedInteger('dest_port');
            $table->text('event_text')->nullable();
            $table->text('packet_payload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snort');
    }
}