<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_nama')->nullable();
            $table->string('app_namapendek')->nullable();
            $table->string('paginationjml')->nullable();
            $table->string('lembaga_nama')->nullable();
            $table->string('lembaga_jalan')->nullable();
            $table->string('lembaga_telp')->nullable();
            $table->string('lembaga_kota')->nullable();
            $table->string('lembaga_logo')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
