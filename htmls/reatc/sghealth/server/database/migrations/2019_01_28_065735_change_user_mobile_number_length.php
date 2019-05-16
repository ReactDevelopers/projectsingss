<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserMobileNumberLength extends Migration
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

        DB::statement("ALTER TABLE `users` CHANGE `mobile_no` `mobile_no` CHAR(20) CHARACTER SET {$charset} COLLATE {$collation} NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `user_verifications` CHANGE `mobile_no` `mobile_no` CHAR(20) CHARACTER SET {$charset} COLLATE {$collation} NULL DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $charset = Config::get('database.connections.mysql.charset');
        $collation = Config::get('database.connections.mysql.collation');

        DB::statement("ALTER TABLE `users` CHANGE `mobile_no` `mobile_no` CHAR(15) CHARACTER SET {$charset} COLLATE {$collation} NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `users` CHANGE `user_verifications` `mobile_no` CHAR(15) CHARACTER SET {$charset} COLLATE {$collation} NULL DEFAULT NULL;");
    }
}
