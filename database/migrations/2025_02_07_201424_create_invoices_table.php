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
            $table->foreignId('customer_id')->constrained('customers')->onDelete('restrict');
            $table->string('company_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->decimal('sub_total', 15, 2)->unsigned();
            $table->decimal('tax_amount', 15, 2)->unsigned()->default(0.00);
            $table->decimal('shipping_amount', 15, 2)->unsigned()->default(0.00);
            $table->decimal('discount_amount', 15, 2)->unsigned()->default(0.00);
            $table->string('shipping_option', 60)->nullable();
            $table->string('shipping_method', 60)->nullable();
            $table->string('coupon_code', 120)->nullable();
            $table->string('discount_description')->nullable();
            $table->decimal('amount', 15, 2)->unsigned();
            $table->enum('payment_status', ['pending', 'paid', 'partial', 'refunded', 'canceled', 'overdue'])->default('pending');
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
