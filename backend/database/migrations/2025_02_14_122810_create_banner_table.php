<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// banner database migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->text('company_description'); // For the company description
            $table->text('intro'); // For the introduction
            $table->string('background_image')->nullable(); // For the background image (URL or path)
            $table->string('email'); // For the contact email
            $table->string('phone'); // For the contact phone number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

