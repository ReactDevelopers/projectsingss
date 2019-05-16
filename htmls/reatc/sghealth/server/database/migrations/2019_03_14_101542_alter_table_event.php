<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('certificate_ids');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->json('place')->nullable()->after('description');
            $table->integer('no_of_attendees')->nullable()->after('attendance_should_be');
            $table->unsignedInteger('branch_id')->nullable()->after('institute_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('set null');
            $table->enum('is_lucky_draw',['Yes','No'])->default('No')->nullable()->after('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
            $table->dropColumn('place');
            $table->dropColumn('is_lucky_draw');
            $table->dropColumn('no_of_attendees');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->text('address')->after('description')->nullable();
            $table->string('latitude')->nullable()->after('address');
            $table->string('longitude')->nullable()->after('latitude');
            $table->json('certificate_ids')->nullable()->after('institute_id');
        });

            
    }
}
