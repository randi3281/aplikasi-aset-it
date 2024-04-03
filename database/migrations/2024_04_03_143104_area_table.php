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
        schema::create('area_user_aplikasi', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('nik')->nullable();
            $table->string('area_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_user_aplikasi');
    }
};
