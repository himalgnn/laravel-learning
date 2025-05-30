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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
//             id
// title
// slug
// image-nullable
// icon - nullable
// description
// rank
// status
// deleted_at
// created_at
// updated_at
// created_by
// updated_by  nullable
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->integer('rank')->default(0);
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
        Schema::dropIfExists('categories');
    }
};
