<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserVerification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $charset = Config::get('database.connections.mysql.charset');
        $collation = Config::get('database.connections.mysql.collation');

        DB::table('user_verifications')->delete();
        DB::statement("ALTER TABLE `user_verifications` CHANGE `user_id` `user_id` INT(10) UNSIGNED NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `user_verifications` CHANGE `for` `purpose` ENUM('reset_pasword','data_verification','mobile_verify_before_reg') CHARACTER SET {$charset} COLLATE {$collation} NOT NULL");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $charset = Config::get('database.connections.mysql.charset');
        $collation = Config::get('database.connections.mysql.collation');

        DB::statement("ALTER TABLE `user_verifications` CHANGE `user_id` `user_id` INT(10) UNSIGNED;");
        DB::statement("ALTER TABLE `user_verifications` CHANGE `purpose` `for` ENUM('reset_pasword','data_verification') CHARACTER SET {$charset} COLLATE {$collation} NOT NULL");
    }
}
