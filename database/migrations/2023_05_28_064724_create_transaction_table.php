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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("event_id");
            $table->unsignedBigInteger("event_ticket_category_id");
            $table->unsignedBigInteger("event_promo_id")->nullable();
            $table->datetime("selected_date");
            $table->datetime("purchase_date");
            $table->integer("qty");
            $table->float("total_price", 15, 2);
            $table->datetime("start_pay_date")->nullable();
            $table->string("payment_method", 100);
            $table->string("status", 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};
