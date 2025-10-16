<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('offer_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('super_title')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->string('brand_name');
            $table->string('brand_image')->nullable();

            $table->string('offer_amount')->nullable();
            $table->string('minimum_order')->nullable();
            $table->string('cash_back_limit')->nullable();

            $table->text('description')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('validity')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};