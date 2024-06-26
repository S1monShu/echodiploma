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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_application');
            $table->boolean('agree_application');
            /*
             * PERCENT OF POPULARITY
             * 0 - LOW POPULARITY
             * 50 - MEDIUM POPULARITY
             * 100 - AWESOME POPULARITY - TOP_CHART
             */
            $table->integer('popularity')->default(0);
            $table->string('song_url');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
