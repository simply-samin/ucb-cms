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
        Schema::create('highlight_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline_text')->nullable();         
            $table->string('main_heading')->nullable();        
            $table->string('background_image')->nullable();     
            $table->string('primary_cta_text')->nullable();     
            $table->string('primary_cta_link')->nullable();
            $table->string('secondary_cta_text')->nullable();   
            $table->string('secondary_cta_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlight_sections');
    }
};
