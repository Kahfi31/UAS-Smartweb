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
        Schema::create('search_history', function (Blueprint $table) {
            $table->id();
            $table->text('user_query'); // Input dari user
            $table->text('ai_response')->nullable(); // Response dari AI
            $table->json('recommendations')->nullable(); // Rekomendasi yang diberikan
            $table->string('category', 50)->nullable(); // Kategori (kuliner, budaya, dll)
            $table->boolean('is_success')->default(true); // Status berhasil/gagal
            $table->text('error_message')->nullable(); // Pesan error jika gagal
            $table->string('ip_address', 45)->nullable(); // IP address user
            $table->text('user_agent')->nullable(); // User agent browser
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_history');
    }
};
