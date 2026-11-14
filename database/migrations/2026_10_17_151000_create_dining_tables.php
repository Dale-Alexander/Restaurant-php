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
        //Named dining_tables because 'table' is a reserved word in SQL
        Schema::create('dining_tables', function (Blueprint $table) {
            $table->id();
            $table->string('number', 10)->unique(); //e.g. "T-04"
            $table->unsignedTinyInteger('capacity'); //number of seats
            $table->boolean('is_inside')->default(true);
            $table->boolean('is_active')->default(true); //false when the table is out of service
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dining_tables');
    }
};
