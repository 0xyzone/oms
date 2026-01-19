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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->comment('Id related to the category');
            $table->string('name')->unique()->comment('Name of the product');
            $table->text('description')->nullable()->comment('Description of the product');
            $table->decimal('price', 10, 2)->comment('Price of the product');
            $table->integer('stock')->default(0)->comment('Stock quantity of the product');
            $table->boolean('is_active')->default(true)->comment('Is the product active?');
            $table->string('image')->nullable()->comment('Image URL of the product');
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
