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
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('user_role_id')->references('id')->on('user_role')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('event', function (Blueprint $table) {
            $table->foreign('event_organizer_id')->references('id')->on('user')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->foreign('event_type_id')->references('id')->on('event_type')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('event_ticket_category', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('event')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('event_promo', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('event')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('user')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('event_id')->references('id')->on('event')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('event_ticket_category_id')->references('id')->on('event_ticket_category')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('event_promo_id')->references('id')->on('event_promo')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
