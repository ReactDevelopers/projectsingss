<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAssignmentApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->enum('status',['active','closed','archive'])->after('description');
            $table->dropColumn('start_date_time');
            $table->dropColumn('end_date_time');
        });
    
        Schema::table('assignment_application', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->after('assignment_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null');
            
            $table->unique(['user_id', 'assignment_id']);

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
            $table->dropColumn('status');
            $table->date('start_date_time')->nullable();
            $table->date('end_date_time')->nullable();
        });
    
        Schema::table('assignment_application', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropUnique(['user_id', 'assignment_id']);
            $table->dropColumn('user_id');
        });
    }
}
