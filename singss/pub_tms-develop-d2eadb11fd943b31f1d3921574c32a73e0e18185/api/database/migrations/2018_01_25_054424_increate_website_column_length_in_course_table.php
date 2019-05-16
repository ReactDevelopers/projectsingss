<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreateWebsiteColumnLengthInCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $collation  = config('database.connections.mysql.collation');
        $charset  = config('database.connections.mysql.charset');
        
        \DB::statement("ALTER TABLE `courses` CHANGE `website` `website` VARCHAR(255) CHARACTER SET {$charset} COLLATE {$collation} NULL DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
