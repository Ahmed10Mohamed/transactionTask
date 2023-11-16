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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 8, 2);
            $table->double('amount_vat', 8, 2);
            $table->foreignId('user_id')->constrained('users');
            $table->date('due_date')->nullable();
            $table->integer('vat')->nullable();
            $table->boolean('is_vat');
            $table->enum('status', ['paid', 'outstanding','overdue']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
