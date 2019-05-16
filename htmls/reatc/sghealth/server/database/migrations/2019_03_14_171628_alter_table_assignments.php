<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable()->after('institute_id');
            $table->foreign('branch_id')->references('id')->on('branches')
            ->onDelete('set null');

            $table->string('title')->nullable()->after('branch_id');

            $table->string('description')->nullable()->after('title');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('title');
            $table->dropColumn('description');
           
        });
    }
}
