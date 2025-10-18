<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_sections', function (Blueprint $table) {
            $table->id();
            $table->string('super_title')->nullable();
            $table->string('title_static')->nullable();
            $table->json('title_dynamic')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_sections');
    }
};