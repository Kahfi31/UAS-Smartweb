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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('lokasi_nama');
            $table->text('deskripsi');
            $table->integer('rating'); // 1-5 stars
            $table->string('kategori')->nullable(); // wisata alam, budaya, kuliner, etc.
            $table->string('lokasi_alamat')->nullable();
            $table->json('gambar')->nullable(); // Array of image URLs
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
