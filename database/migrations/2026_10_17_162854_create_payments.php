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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_method', array_column(PaymentMethod::cases(), 'value'));
            $table->decimal('amount', 7, 2);
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('status', array_column(PaymentStatus::cases(), 'value'))->default(PaymentStatus::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
