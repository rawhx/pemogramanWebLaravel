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
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('barang_id')->primary();
            $table->string('barang_nama');
            $table->integer('barang_harga');
            $table->uuid('barang_kategori');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('barang_kategori')->references('kategori_id')->on('kategori')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
