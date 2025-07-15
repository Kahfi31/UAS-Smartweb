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
        Schema::create('visited_places', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->string('lokasi');
            $table->string('kategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('jumlah_rating')->default(0);
            $table->text('ulasan')->nullable();
            $table->string('gambar_ulasan')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visited_places');
    }
};
