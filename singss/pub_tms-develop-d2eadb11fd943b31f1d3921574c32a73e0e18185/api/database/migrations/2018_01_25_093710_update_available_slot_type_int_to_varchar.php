<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAvailableSlotTypeIntToVarchar extends Migration
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
        \DB::statement("ALTER TABLE `running_courses` CHANGE `available_slots` `available_slots` VARCHAR(100) CHARACTER SET {$charset} COLLATE {$collation} NOT NULL DEFAULT '0';");
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
