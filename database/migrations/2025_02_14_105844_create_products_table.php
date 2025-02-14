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
            $table->string('name'); // প্রোডাক্টের নাম
            $table->text('description')->nullable(); // প্রোডাক্টের বিবরণ (optional)
            $table->decimal('price', 10, 2); // প্রোডাক্টের দাম
            $table->unsignedBigInteger('category_id'); // ক্যাটাগরি আইডি (Foreign Key)
            $table->timestamps();

            // ক্যাটাগরি আইডির ওপর ফরেন কি কনস্ট্রেইন্ট
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
