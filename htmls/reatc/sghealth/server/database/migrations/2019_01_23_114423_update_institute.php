<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInstitute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institutes', function (Blueprint $table) {
            //
            $table->unsignedInteger('institute_category_id')->nullable();
            $table->foreign('institute_category_id')
                  ->references('id')
                  ->on('institute_categories')
                  ->onDelete('cascade');
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
            //
            $table->dropForeign(['institute_category_id']);
            $table->dropColumn('institute_category_id');
        });
    }
}
