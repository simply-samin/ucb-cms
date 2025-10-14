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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->text('head_office_address')->nullable();
            $table->string('support_email')->nullable();
            $table->string('hotline')->nullable();
            $table->json('social_links')->nullable();
            $table->json('mobile_apps')->nullable();
            $table->json('links')->nullable();
            $table->string('copyright_text')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
