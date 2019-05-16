<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMediaTypeCellLength extends Migration
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
        DB::statement("ALTER TABLE `media` CHANGE `type` `type` VARCHAR(255) CHARACTER SET {$charset} COLLATE {$collation} NOT NULL DEFAULT '';");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
