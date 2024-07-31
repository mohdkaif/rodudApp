<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
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
            $table->bigInteger('user_id')->default(0);
            $table->string('pickup_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('pickup_date_time')->nullable();
            $table->string('delivery_date_time')->nullable();
            $table->enum('status', ['dispatched', 'inactive', 'pending','in_transit','cancelled','out_for_delivery','returned','delivered'])->default('pending');
            $table->integer('updated_by')->default(0);
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
}
