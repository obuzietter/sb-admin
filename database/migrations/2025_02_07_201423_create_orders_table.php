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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // User and Payment information
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->uuid('payment_id')->nullable();
            $table->foreign('payment_id')->nullable()->references('id')->on('payments')->nullOnDelete();

            // Order status and shipping details
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->string('shipping_option', 60)->nullable();
            $table->string('shipping_method', 60)->default('default');

            // Financial details
            $table->decimal('tax_amount', 15, 2)->nullable();
            $table->decimal('shipping_amount', 15, 2)->nullable();
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->decimal('sub_total', 15, 2);
            $table->decimal('amount', 15, 2);

            // Discount and cancellation
            $table->string('coupon_code', 120)->nullable();
            $table->string('discount_description', 191)->nullable();
            $table->string('cancellation_reason', 191)->nullable();

            // Other attributes
            $table->text('description')->nullable();
            $table->string('token', 120)->nullable();
            $table->boolean('is_new')->default(1);
            $table->boolean('is_confirmed')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
