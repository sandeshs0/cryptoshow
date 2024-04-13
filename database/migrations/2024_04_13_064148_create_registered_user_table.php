<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_nickname', 20)->nullable();
            $table->string('user_name', 50)->nullable();
            $table->string('user_email', 50)->nullable();
            $table->string('user_hashed_password', 255)->nullable();
            $table->tinyInteger('user_device_count')->unsigned()->default(0);
            $table->timestamp('user_registered_timestamp')->nullable();
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
        Schema::dropIfExists('registered_user');
    }
}

