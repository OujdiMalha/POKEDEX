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
        if (!Schema::hasTable('attaques')) {
            Schema::create('attaques', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->string('image')->nullable();
                $table->integer('degats');
                $table->text('description')->nullable();
                $table->unsignedBigInteger('type_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaque_pokemon');
    }
};
