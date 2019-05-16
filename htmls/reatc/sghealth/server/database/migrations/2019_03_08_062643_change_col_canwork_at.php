<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColCanworkAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professions', function (Blueprint $table) {
            $table->dropColumn('can_work_at');
        });

        Schema::table('professions', function (Blueprint $table) {
            $table->json('options')->after('profession_category_id')->nullable();
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
            $table->dropColumn('options');
        });

        Schema::table('professions', function (Blueprint $table) {
            $table->enum('can_work_at',['true','false'])->default('false')->nullable();
        });
    }
}
