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
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('no_fa_sap')->nullable();
            $table->string('no_fa_fams')->nullable();
            $table->string('capitalized_on')->nullable();
            $table->string('asset_description')->nullable();
            $table->integer('acquis_val')->nullable();
            $table->integer('accum_dep')->nullable();
            $table->integer('book_val')->nullable();
            $table->string('currency')->nullable();
            $table->integer('cost_center')->nullable();
            $table->integer('location')->nullable();
            $table->string('deactivation_on')->nullable();
            $table->string('location_sap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang');
    }
};
