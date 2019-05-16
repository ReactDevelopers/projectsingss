<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColProfCatId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professions', function (Blueprint $table) {
            $table->unsignedInteger('profession_category_id')->after('description')->nullable();
            $table->foreign('profession_category_id')
                  ->references('id')
                  ->on('profession_categories')
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
        Schema::table('professions', function (Blueprint $table) {
            $table->dropForeign(['profession_category_id']);
            $table->dropColumn('profession_category_id');
        });
    }
}
