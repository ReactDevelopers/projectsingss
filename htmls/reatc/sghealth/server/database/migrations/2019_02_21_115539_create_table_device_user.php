<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeviceUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_user', function (Blueprint $table) {

            $table->increments('id');

            $table->unSignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('CASCADE');

            $table->unSignedInteger('device_id');
            $table->foreign('device_id')
                ->references('id')->on('devices')
                ->onDelete('CASCADE');

            $table->unSignedInteger('login_index');
            $table->enum('active', ['Yes','No'])->default('Yes');

            $table->unique(['user_id', 'device_id']);

            $table->json('settings')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_user');
    }
}
