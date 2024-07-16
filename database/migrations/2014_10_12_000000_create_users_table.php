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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age')->nullable(); // Assuming age is an integer
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Enum with possible values
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('specialization')->nullable();
            $table->string('address');
            $table->string('id_number')->nullable();
            $table->boolean('active')->default(1); // Use default(0) for boolean, assuming 0 means pending.
            $table->boolean('doctor')->default(0); // Use default(0) for boolean, assuming 0 means pending.
            $table->string('password');
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
