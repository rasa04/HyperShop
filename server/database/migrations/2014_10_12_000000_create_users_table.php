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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('display_name', 30);
            $table->string('username', 30)->unique();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80);
            $table->string('first_name', 20)->nullable();
            $table->string('middle_name', 20)->nullable();
            $table->string('last_name', 20)->nullable();
            $table->unsignedSmallInteger('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone', 30)->unique()->nullable();
            $table->string('address', 50)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('state', 30)->nullable();
            $table->text('title')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
