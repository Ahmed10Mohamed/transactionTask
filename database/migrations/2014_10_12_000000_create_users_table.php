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
            $table->string('user_name');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->integer('added_by')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
                $table->integer('updated_by')->default(0);
             $table->integer('deleted_by')->default(0);
             $table->enum('user_type', ['admin', 'customer']);
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
