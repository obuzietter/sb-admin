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
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // User ID (nullable for guest checkout)
            //$table->string('session_id')->nullable(); // For guest users
            $table->foreignId('product_id')->constrained()->nullOnDelete(); // Product reference
            $table->string('product_name'); // Product name
            //$table->string('slug')->unique(); // SEO-friendly product slug
            $table->decimal('price', 10, 2); // Product price
            $table->integer('quantity'); // Quantity of product in cart
            $table->decimal('total_price', 10, 2); // Total price = price * quantity
            $table->string('image_url')->nullable(); // Product image
            $table->decimal('discount', 10, 2)->default(0); // Discount amount
            $table->decimal('discounted_price', 10, 2)->nullable(); // Price after discount
            $table->decimal('tax', 10, 2)->default(0); // Tax amount
            $table->decimal('shipping_cost', 10, 2)->default(0); // Shipping fee
            $table->integer('stock')->nullable(); // Product stock
            $table->integer('max_quantity')->nullable(); // Max quantity allowed per order
            $table->string('coupon_code')->nullable(); // Applied coupon code
            $table->date('estimated_delivery')->nullable(); // Estimated delivery date
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
