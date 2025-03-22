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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();

            $table->string('first_name')->nullable();
            
            $table->string('last_name')->nullable();

            $table->string('company_name')->nullable();
            
            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('physical_address')->nullable();

            $table->string('city')->nullable();

            $table->string('post_code')->nullable();

            $table->enum('address_type', ['billing', 'shipping'])->default('billing');

            $table->text('order_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
