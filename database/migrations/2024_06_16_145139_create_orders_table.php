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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('address');
            $table->unsignedBigInteger('plan_id');
            $table->decimal('total_price', 6, 2);
            $table->enum('payment_method', ['cash', 'mfs', 'credit_card']);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('plan_id')->references('id')->on('plans')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
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
