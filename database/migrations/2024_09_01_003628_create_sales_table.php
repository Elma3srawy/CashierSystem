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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->enum('status' , ['pending' , 'inactive'])->default('pending');
            $table->string('number_of_week')->nullable();
            $table->string('number_of_year')->nullable();
            $table->string('month_name')->nullable();
            $table->string('total_price')->nullable();
            $table->string('payments')->nullable();
            $table->string('order_ids')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
