<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            if (!Schema::hasColumn('destinasis', 'created_by')) {
                $table->unsignedBigInteger('created_by')->nullable()->after('jam_operasional');

                // Jika kamu punya tabel users dan ingin relasi:
                // $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};

