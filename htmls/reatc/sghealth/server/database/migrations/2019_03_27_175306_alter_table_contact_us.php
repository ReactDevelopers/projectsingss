<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('subject');
        });

        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id'); 
            $table->string('phone_number')->nullable()->after('email');
            $table->string('subject')->nullable()->after('name');

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
            $table->dropColumn('name')->nullable();
            $table->dropColumn('phone_number')->nullable();
            $table->dropColumn('subject');
              
        });
        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('subject')->after('id');
        });
    }
}
