<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('featured_offer_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title_prefix')->nullable();
            $table->string('title_accent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_offer_sections');
    }
};