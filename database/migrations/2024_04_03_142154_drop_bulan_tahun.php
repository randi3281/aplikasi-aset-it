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
        Schema::table('mutasi_now', function (Blueprint $table) {
            $table->dropColumn('bulan');
            $table->dropColumn('tahun');
            $table->string('area_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mutasi_now', function (Blueprint $table) {
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->dropColumn('area_user');
        });
    }
};
