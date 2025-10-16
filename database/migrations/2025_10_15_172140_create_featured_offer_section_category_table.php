<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('featured_offer_section_category', function (Blueprint $table) {
            $table->id();

            $table->foreignId('featured_offer_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('offer_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('super_title')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('media_type')->nullable();
            $table->string('media_image')->nullable();

            $table->integer('sort')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_offer_section_category');
    }
};