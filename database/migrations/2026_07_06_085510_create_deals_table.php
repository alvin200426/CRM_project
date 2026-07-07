<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->foreignId('sales_id')->constrained('users')->cascadeOnDelete();
            
            // Kolom Data
            $table->string('nama_deal');
            $table->bigInteger('nilai_rupiah')->nullable();
            $table->string('stage')->default('Baru');
            $table->enum('status_deal', ['Pipeline', 'Won', 'Lost'])->default('Pipeline');
            $table->text('alasan_lost')->nullable(); // Boleh kosong jika belum/tidak lost
            $table->dateTime('waktu_closing')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
