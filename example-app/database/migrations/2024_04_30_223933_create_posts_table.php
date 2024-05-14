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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean('active')->default(false);
            $table->integer('idPost');
            $table->integer('idUser');

            $table->boolean('haveimage')->default(false);
            $table->string('imagename')->nullable();
            $table->text('message');
            $table->string('desc')->max(254);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
