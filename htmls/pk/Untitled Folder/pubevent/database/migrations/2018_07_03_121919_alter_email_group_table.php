<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmailGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $charset  = config('database.connections.mysql.charset');
        $collation  = config('database.connections.mysql.collation');

        \DB::statement("ALTER TABLE `email_group` CHANGE `recipient` `recipient` ENUM('1','2') CHARACTER SET {$charset} COLLATE {$collation} NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $charset  = config('database.connections.mysql.charset');
        $collation  = config('database.connections.mysql.collation');
        
        \DB::statement("ALTER TABLE `email_group` CHANGE `recipient` `recipient` ENUM('1','2') CHARACTER SET {$charset} COLLATE {$collation} NULL");
    }
}
