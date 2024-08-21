<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->string('image')->nullable()->after('taille');
        });
    }

    public function down()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
