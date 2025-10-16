<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lounge_sections', function (Blueprint $table) {
            $table->id();

            $table->string('media_type')->nullable();
            $table->string('media_path')->nullable();

            $table->string('super_title')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lounge_sections');
    }
};