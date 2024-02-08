<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_no', 20);
            $table->decimal('order_subtotal', $precision = 7, $scale = 2);
            $table->decimal('order_total', $precision = 7, $scale = 2);
            $table->string('order_payment_provider')->default('none');
            $table->string('order_payment_id')->default('none');
            $table->unsignedBigInteger('shipping_id');
            $table->unsignedBigInteger('shipping_address_id');
            $table->unsignedBigInteger('billing_address_id');
            $table->string('order_status', 20)->default('unpaid')->comment('paid,unpaid');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_id')->references('id')->on('shipping_methods');
            $table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('billing_address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
    }
};