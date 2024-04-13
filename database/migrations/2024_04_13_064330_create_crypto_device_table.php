<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_device', function (Blueprint $table) {
            $table->bigIncrements('crypto_device_id');
            $table->unsignedBigInteger('fk_user_id');
            $table->string('crypto_device_name')->nullable();
            $table->string('crypto_device_image_name')->nullable();
            $table->boolean('crypto_device_record_visible')->default(false);
            $table->timestamp('crypto_device_registered_timestamp')->nullable();
            $table->foreign('fk_user_id')->references('user_id')->on('registered_user');
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
        Schema::dropIfExists('crypto_device');
    }
}

