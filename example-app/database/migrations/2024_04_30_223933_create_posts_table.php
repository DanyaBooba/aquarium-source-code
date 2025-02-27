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
            $table->string('title')->nullable();
            $table->text('message');
            $table->text('themeId')->nullable();
            $table->string('desc')->max(254);

            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->json('usersLikes')->nullable();
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
