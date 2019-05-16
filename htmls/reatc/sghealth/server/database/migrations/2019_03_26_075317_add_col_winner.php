<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColWinner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_event', function (Blueprint $table) {
            $table->enum('is_winner',['Yes','No'])->nullable()->after('status');
            $table->enum('register_as_lucky_draw',['Yes','No'])->nullable()->after('is_winner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_event', function (Blueprint $table) {
            $table->dropColumn('is_winner');
            $table->dropColumn('register_as_lucky_draw');
        });
    }
}
