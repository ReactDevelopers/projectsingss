<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBranchIdCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->json('branch_ids')->nullable()->after('institute_id');
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
            $table->dropColumn('branch_ids');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable()->after('institute_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');
        });
    }
}
