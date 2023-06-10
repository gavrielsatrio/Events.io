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
        Schema::create('event', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("event_organizer_id");
            $table->unsignedBigInteger("event_type_id");
            $table->string("name", 200);
            $table->text("artist");
            $table->text("description");
            $table->text("thumbnail_path");
            $table->text("banner_path");
            $table->string("city_and_province", 200);
            $table->string("place", 200);
            $table->string("gradient_cover_color", 100);
            $table->date("start_date");
            $table->date("end_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->string("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
};
