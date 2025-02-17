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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Using UUID as primary key

            // Transaction Details
            $table->string('invoice_id')->nullable();    
            $table->enum('state', ['PENDING', 'PROCESSING', 'FAILED', 'CANCELED', 'PARTIAL', 'COMPLETE', 'RETRY'])->default('PENDING');            
            $table->enum('provider', ['M-PESA', 'CARD-PAYMENT', 'BITCOIN', 'BANK-ACH', 'COOP_B2B']);
            $table->decimal('charges', 10, 2)->default(0.00);
            $table->decimal('net_amount', 10, 2);
            $table->string('currency', 3)->default('KES');
            $table->decimal('value', 10, 2);
            
            // Account and Payment References
            $table->string('account');
            $table->string('api_ref')->nullable();
            $table->string('mpesa_reference')->nullable();
            
            // Failure Details
            $table->text('failed_reason')->nullable();
            $table->string('failed_code')->nullable();
            
            // Customer and Phone Information
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->string('phone_number');
            
            // Additional Attributes
            $table->boolean('is_new')->default(1);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
