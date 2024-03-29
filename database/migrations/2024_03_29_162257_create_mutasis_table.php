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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->integer('no')->nullable();
            $table->integer('asset')->nullable();
            $table->string('kode_fa')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('outlet_actual')->nullable();
            $table->string('type_barang')->nullable();
            $table->string('location')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('user_domain')->nullable();
            $table->integer('nik')->nullable();
            $table->string('komputer_nama')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('sophos')->nullable();
            $table->string('landesk')->nullable();
            $table->string('mutasi_asal')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
