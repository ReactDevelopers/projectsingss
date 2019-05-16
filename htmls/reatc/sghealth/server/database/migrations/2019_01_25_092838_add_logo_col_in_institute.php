<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoColInInstitute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institutes', function (Blueprint $table) {
            $table->unsignedInteger('logo_id')->after('registration_no')->nullable();
            $table->foreign('logo_id')
                  ->references('id')
                  ->on('media')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institutes', function (Blueprint $table) {
            $table->dropForeign(['logo_id']);
            $table->dropColumn('logo_id');
        });
    }
}
