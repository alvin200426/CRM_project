<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('sales_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('source_id')->constrained('lead_sources')->restrictOnDelete();
            
            // Kolom Data
            $table->string('nama_prospek');
            $table->string('kontak');
            $table->enum('status_kualifikasi', ['Potensial', 'Tidak Potensial'])->default('Potensial');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
