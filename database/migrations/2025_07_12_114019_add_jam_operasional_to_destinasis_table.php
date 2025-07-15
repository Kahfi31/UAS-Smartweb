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
        Schema::table('destinasis', function (Blueprint $table) {
            $table->string('jam_operasional')->nullable()->after('deskripsi');
            $table->dropColumn('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->text('deskripsi')->after('lokasi');
            $table->dropColumn('jam_operasional');
        });
    }
};
