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
        Schema::create('dataservices', function (Blueprint $table) {
            $table->id();
            $table->string('Kerusakan');
            $table->string('Deskripsi');
            $table->date('Tanggal_service');
            $table->date('Selesai_service');
            $table->string('Teknisi');
            $table->string('Biaya');
            $table->foreignId('databarang_id')->constrained('databarangs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataservices');
    }
};
