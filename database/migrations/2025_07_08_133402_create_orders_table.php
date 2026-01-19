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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->string('status')->default('pending'); // e.g., pending, completed
            $table->string('payment_method')->nullable(); // e.g., credit card, PayPal
            $table->string('transaction_id')->nullable(); // For payment tracking
            $table->string('shipping_method')->nullable(); // e.g., standard, express
            $table->dateTime('shipped_at')->nullable(); // When the order was shipped
            $table->dateTime('delivered_at')->nullable(); // When the order was delivered
            $table->text('notes')->nullable(); // Additional notes for the order
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
