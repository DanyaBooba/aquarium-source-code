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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean('verified')->default(false);
            $table->boolean('blocked')->default(false);

            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('avatar');
            $table->string('cap');
            $table->string('desc');

            $table->boolean('avatarDefault')->default(true);
            $table->boolean('capDefault')->default(true);

            $table->integer('sub')->default(0);
            $table->integer('subs')->default(0);
            $table->integer('achivs')->default(0);

            $table->json('subJson')->nullable();
            $table->json('subsJson')->nullable();
            $table->json('achivsJson')->nullable();

            $table->json('settings_notifications')->nullable();

            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
