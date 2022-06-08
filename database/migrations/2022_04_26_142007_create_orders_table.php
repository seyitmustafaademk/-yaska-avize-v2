<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 100);
            $table->decimal('total_price')->nullable();
            $table->decimal('total_paid_price')->nullable();
            $table->boolean('order_status')->nullable();
            $table->boolean('payment_status')->nullable();
            $table->decimal('iyzi_commission_fee')->nullable();
            $table->decimal('iyzi_commission_rate_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
