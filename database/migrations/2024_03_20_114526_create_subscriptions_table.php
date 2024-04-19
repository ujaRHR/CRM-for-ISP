<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('plan_id');
            $table->date('start_date');
            $table->date('next_billing_date');
            $table->enum('status', ['active', 'inactive', 'restricted'])->default('inactive');
            $table->decimal('total_cost', 6, 2);
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
    public function down() : void
    {
        Schema::dropIfExists('subscriptions');
    }
};
