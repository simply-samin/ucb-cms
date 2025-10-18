<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            $table->string('brand_name');
            $table->string('brand_image')->nullable();
            $table->string('brand_link')->nullable();

            $table->text('description')->nullable();  
            $table->boolean('is_active')->default(true);
            $table->integer('sort')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};