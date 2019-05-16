<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProfessionNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `profession_id` `profession_id` INT(10) UNSIGNED NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `profession_id` `profession_id` INT(10) UNSIGNED NOT NULL");
        });
    }
}
