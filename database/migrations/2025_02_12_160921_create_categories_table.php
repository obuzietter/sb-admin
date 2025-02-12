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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
              // Basic category information
              $table->string('name');
              $table->string('slug')->unique();
              $table->text('description')->nullable();
  
  
              // Optional image URL for the category
              $table->string('image_url')->nullable();
  
              // SEO fields
              $table->string('meta_title')->nullable();
              $table->text('meta_description')->nullable();
              $table->string('meta_keywords')->nullable();
  
              // Display and status fields
              $table->integer('display_order')->default(0);
              $table->boolean('is_active')->default(true);
  
              // Foreign key constraint for parent category
              $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');
              
              // Timestamps for created_at and updated_at
              $table->timestamps();
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
