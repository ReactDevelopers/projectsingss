<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColReplied extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('replied');
        });

        Schema::table('contact_us', function (Blueprint $table) {
            $table->longtext('replied')->after('body')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('replied');
        });

        Schema::table('contact_us', function (Blueprint $table) {
            $table->json('replied')->after('body')->nullable();
        });
    }
}
