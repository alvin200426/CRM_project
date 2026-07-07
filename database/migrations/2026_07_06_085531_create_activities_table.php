<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // Siapa yang mencatat (Sales/CS)
            
            // Morph relation manual untuk menentukan tabel mana yang direlasikan
            $table->enum('kategori_modul', ['Lead', 'Deal', 'Customer']);
            $table->unsignedBigInteger('modul_id'); 
            
            // Kolom Data
            $table->string('jenis_interaksi'); // Cth: Telepon, WhatsApp
            $table->text('catatan_detail');
            $table->dateTime('tanggal_interaksi');
            $table->dateTime('jadwal_next_action')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
