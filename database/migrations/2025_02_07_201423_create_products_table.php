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
            // Primary Key
            $table->id();
        
            // Basic Product Information
            $table->string('sku', 191)->unique();
            $table->string('name', 191);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
        
            // Product Status
            $table->boolean('is_published')->default(0);
            $table->boolean('is_enabled')->default(0);
            $table->boolean('is_featured')->default(0);
        
            // Inventory Management
            $table->double('quantity')->nullable()->default(0);
            $table->double('threshold')->nullable()->default(0);
            $table->boolean('allow_checkout_when_out_of_stock')->default(0);
        
            // Pricing Information
            $table->double('cost', 15, 2)->nullable();
            $table->double('price', 15, 2)->nullable();
            $table->double('special_price', 15, 2)->nullable();
            $table->double('whole_sale_price', 15, 2)->nullable();
            $table->double('sale_price', 15, 2)->nullable();
        
            // Sale Details
            $table->boolean('on_sale')->default(0);
            $table->enum('sale_criteria', ['NONE', 'DATE', 'QUANTITY'])->default('NONE');
            $table->double('sale_qty', 15, 2)->nullable();
            $table->timestamp('sale_start_date')->nullable();
            $table->timestamp('sale_end_date')->nullable();
        
            // Tax Information
            $table->boolean('is_taxable')->default(0);
            $table->foreignId('tax_id')->nullable()->constrained('taxes')->nullOnDelete();
        
            // Category and Brand
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            
            // Supplier
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->nullOnDelete();
        
            // Product Type
            $table->enum('product_type', ['PHYSICAL', 'DIGITAL'])->default('PHYSICAL');
        
            // Dimensions & Weight
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
        
            // Media
            $table->string('image', 191)->nullable();
            $table->text('images')->nullable();
        
            // Barcode & License
            $table->string('barcode', 50)->nullable();
            $table->boolean('generate_license_code')->default(0);
        
            // Order Constraints
            $table->integer('minimum_order_quantity')->default(0)->unsigned();
            $table->integer('maximum_order_quantity')->default(-1);
        
            // Timestamps
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
