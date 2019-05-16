<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniqueMobileNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::select(DB::raw("Delete a FROM users a INNER JOIN users b ON a.mobile_no = b.mobile_no WHERE a.id <> b.id "));

        Schema::table('users', function (Blueprint $table) {
            $table->unique('mobile_no');
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
            $table->dropUnique(['mobile_no']);
        });
    }
}
