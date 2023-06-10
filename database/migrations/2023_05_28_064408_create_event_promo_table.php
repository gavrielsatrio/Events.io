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
        Schema::create('event_promo', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("event_id");
            $table->string("code", 100);
            $table->date("start_date");
            $table->date("end_date");
            $table->float("discount_percentage", 5, 2);
            $table->text("description");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_promo');
    }
};
