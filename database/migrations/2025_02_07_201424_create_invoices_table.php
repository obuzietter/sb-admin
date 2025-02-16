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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 60)->unique();
            $table->string('customer_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_tax_id')->nullable();
            $table->unsignedDecimal('sub_total', 15, 2);
            $table->unsignedDecimal('tax_amount', 15, 2)->default(0.00);
            $table->unsignedDecimal('shipping_amount', 15, 2)->default(0.00);
            $table->unsignedDecimal('discount_amount', 15, 2)->default(0.00);
            $table->string('shipping_option', 60)->nullable();
            $table->string('shipping_method', 60)->default('default');
            $table->string('coupon_code', 120)->nullable();
            $table->string('discount_description')->nullable();
            $table->unsignedDecimal('amount', 15, 2);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
