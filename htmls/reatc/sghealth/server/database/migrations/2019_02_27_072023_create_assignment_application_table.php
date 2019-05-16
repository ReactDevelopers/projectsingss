<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_application', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('institute_id');

            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('assignment_id');

            $table->foreign('assignment_id')
                ->references('id')->on('assignments')
                ->onDelete('cascade');

            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');

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
        Schema::dropIfExists('assignment_application');
    }
}
