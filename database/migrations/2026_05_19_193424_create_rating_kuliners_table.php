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
        Schema::create('rating_kuliners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuliner_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('rating');
            $table->string('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_kuliners');
    }
};
