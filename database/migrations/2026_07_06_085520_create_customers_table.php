<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('deal_id')->constrained('deals')->cascadeOnDelete();
            $table->foreignId('cs_id')->constrained('users')->cascadeOnDelete();
            
            // Kolom Data
            $table->string('status_layanan')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
