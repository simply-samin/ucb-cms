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
        Schema::create('emis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('emi_category_id')
                ->nullable()
                ->constrained('emi_categories')
                ->nullOnDelete();

            $table->string('media_type')->nullable();
            $table->string('media_path')->nullable();

            $table->string('super_title')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('validity')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emis');
    }
};