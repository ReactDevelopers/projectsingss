<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('institute_id');

            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            //$table->date('start_date_time');
            //$table->date('end_date_time');

            $table->decimal('cost', 10,2);

            $table->json('options')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('set null');

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
        Schema::dropIfExists('assignments');
    }
}
