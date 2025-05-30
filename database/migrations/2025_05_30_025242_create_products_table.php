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
         
            $table->string('title')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Optional, if you want to store product images
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('country')->nullable();
            $table->string('quality')->nullable();
            $table->boolean('check')->default(0);
            $table->boolean('featured_product')->default(0);
            $table->boolean('status')->default(true); // Assuming is_active is a boolean 
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            
            $table->softDeletes(); // This will add a deleted_at column for soft deletes
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
