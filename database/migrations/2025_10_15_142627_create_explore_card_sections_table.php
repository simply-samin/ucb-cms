<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('explore_card_sections', function (Blueprint $table) {
            $table->id();
            $table->string('media_path')->nullable();
            $table->string('media_type')->nullable();
            $table->float('scale')->default(1.0);
            $table->boolean('spin_clockwise')->default(true);
            $table->float('spin_speed')->default(1.0);
            $table->string('title');
            $table->string('subtitle_static')->nullable();
            $table->json('subtitle_dynamic')->nullable();
            $table->json('keywords')->nullable();
            $table->string('cta_primary_label')->nullable();
            $table->string('cta_primary_link')->nullable();
            $table->string('cta_secondary_label')->nullable();
            $table->string('cta_secondary_link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('explore_card_sections');
    }
};