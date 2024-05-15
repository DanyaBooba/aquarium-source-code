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
        Schema::create('restores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('unixtimeCreate');
            $table->integer('unixtimeToLife');

            $table->integer('idUser');
            $table->text('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restores');
    }
};
