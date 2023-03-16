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
            // review later nullable property
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('about')->nullable();
            $table->string('amount')->nullable();
            $table->integer('price')->nullable();
            $table->string('photo')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('brandId')->unsigned()->nullable();
            $table->integer('categoryId')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('brandId')->references('id')->on('brands');
            $table->foreign('categoryId')->references('id')->on('categories');
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
