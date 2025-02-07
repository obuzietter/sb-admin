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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 191)->unique();
            $table->string('name', 191);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_published')->default(0);
            $table->integer('quantity')->nullable()->default(0);
            $table->boolean('allow_checkout_when_out_of_stock')->default(0);            
            $table->boolean('is_featured')->default(0);
            
            // Corrected Foreign Keys
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->foreignId('tax_id')->nullable()->constrained('taxes')->nullOnDelete();
            
            // Corrected Double Data Type
            $table->double('cost', 15, 2)->nullable();
            $table->double('price', 15, 2)->nullable();
            $table->double('sale_price', 15, 2)->nullable();
            
            $table->timestamp('sale_start_date')->nullable();
            $table->timestamp('sale_end_date')->nullable();
            
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
        
            $table->string('image', 191)->nullable();
            $table->text('images')->nullable();
        
            // Fixed Enum Issue
            $table->enum('product_type', ['PHYSICAL', 'DIGITAL'])->default('PHYSICAL');
        
            $table->string('barcode', 50)->nullable();
            $table->boolean('generate_license_code')->default(0);
            
            // Fixed Unsigned Integer Issue
            $table->unsignedInteger('minimum_order_quantity')->default(0);
            $table->unsignedInteger('maximum_order_quantity')->default(0);            
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
