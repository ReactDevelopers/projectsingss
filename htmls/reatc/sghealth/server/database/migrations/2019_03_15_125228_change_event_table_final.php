<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventTableFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DELETE FROM `events`");

        Schema::table('events', function (Blueprint $table) {

            $table->dropForeign(['institute_id']);
            $table->dropColumn('institute_id');
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
            $table->dropColumn('attendance_should_be');
            $table->dropColumn('no_of_attendees');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('payment_link')->nullable();
            $table->integer('vacancy')->nullable();
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->enum('status',['waiting-list','awaiting-payment','confirm','reject'])->nullable()->after('attendance');
        });

        Schema::create('event_institutes', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            
            $table->unsignedInteger('institute_id')->nullable();
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unique(['institute_id','event_id']);

            $table->timestamps();

        });

        Schema::create('event_branches', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            
            $table->unsignedInteger('branch_id')->nullable();
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->unique(['branch_id','event_id']);
            
            $table->timestamps();
        });

        Schema::create('event_professions', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            
            $table->unsignedInteger('profession_cat_id')->nullable();
            $table->foreign('profession_cat_id')
                ->references('id')->on('profession_categories')
                ->onDelete('cascade');

            $table->unique(['profession_cat_id','event_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement("DELETE FROM `events`");
        DB::statement("DELETE FROM `application_event`");

        Schema::table('events', function (Blueprint $table) {

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('branch_id')->nullable()->after('institute_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('set null');
            
                
            $table->enum('attendance_should_be', ['Yes', 'No'])->default('Yes');
                
            $table->integer('no_of_attendees')->nullable()->after('attendance_should_be');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('payment_link');
            $table->dropColumn('vacancy');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending')->after('attendance');
        });

        

        Schema::dropIfExists('event_institutes');


        Schema::dropIfExists('event_branches');


        Schema::dropIfExists('event_professions');

    }
}
