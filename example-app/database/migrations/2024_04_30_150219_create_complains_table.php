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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('idUser');
            $table->integer('idUserFrom');
            $table->string('reason')->max(254);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
