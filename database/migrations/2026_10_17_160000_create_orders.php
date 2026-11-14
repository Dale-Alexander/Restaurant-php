<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Enums\OrderStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('served_by')->nullable();
            $table->enum('status', array_column(OrderStatus::cases(), 'value'))->default(OrderStatus::PREPARING->value);
            $table->dateTime('closed_at')->nullable();
            $table->decimal('total', 7, 2);
            $table->decimal('subtotal', 7, 2);
            $table->decimal('tax', 7, 2);
            $table->decimal('tip', 5, 2)->default(0);
            $table->decimal('discount', 5, 2)->default(0);
            $table->foreignId('reservation_id')->nullable()->constrained()->nullOnDelete();//walk-ins
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();//walk-ins and for convenience not to access the user thorugh a join between reservation and user and order tables
            $table->foreignId('dining_table_id')->nullable()->constrained()->nullOnDelete();//null for takeaway orders
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
