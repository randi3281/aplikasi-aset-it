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
        Schema::create('penghapusan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_perolehan')->nullable();
            $table->string('asset')->nullable();
            $table->string('kode_fa_fams')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('acquis_val')->nullable();
            $table->string('accum_dep')->nullable();
            $table->string('book_val')->nullable();
            $table->string('outlet_pencatatan');
            $table->string('outlet_actual');
            $table->string('type_barang')->nullable();
            $table->string('location')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('nik')->nullable();
            $table->string('komputer_nama')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('kondisi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('sophos')->nullable();
            $table->string('landesk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghapusan');
    }
};
