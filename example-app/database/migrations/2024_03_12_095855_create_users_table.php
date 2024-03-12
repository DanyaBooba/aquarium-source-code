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

            $table->string('username')->max(100)->min(3);
            $table->string('email')->unique();
            $table->string('avatar')->nullable();

            $table->boolean('verified')->default(false);
            $table->boolean('blocked')->default(false);

            $table->string('description')->nullable()->max(100);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('friend_token')->max(30);

            $table->json('settings_notifications');

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
