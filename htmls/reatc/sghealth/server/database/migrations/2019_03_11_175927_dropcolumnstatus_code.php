<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropcolumnstatusCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_logs', function (Blueprint $table) {
            $table->dropColumn('status_code');
        }); 

        Schema::table('request_logs', function (Blueprint $table) {
            $table->integer('status_code')->default(200);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('request_logs', function (Blueprint $table) {
            $table->dropColumn('status_code');
        });
        
        Schema::table('request_logs', function (Blueprint $table) {
            $table->unsignedTinyInteger('status_code')->default(200);
        }); //
    }
}
