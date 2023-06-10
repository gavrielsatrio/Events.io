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
        Schema::create('user', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("user_role_id");
            $table->string("firstname", 200);
            $table->string("lastname", 200);
            $table->string("email", 200);
            $table->string("password", 200);
            $table->date("date_of_birth");
            $table->string("phone", 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
