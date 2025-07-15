<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            if (!Schema::hasColumn('destinasis', 'kategori')) {
                $table->string('kategori')->after('nama');
            }
        });
    }

    public function down()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
