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
        Schema::create('navigation_bars', function (Blueprint $table) {
            $table->id();

            $table->string('brand_logo')->nullable();
            $table->string('brand_name')->nullable();
            $table->json('menu_items')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_bars');
    }
};
