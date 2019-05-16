<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_students', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('c_users')->onUpdate('cascade')->onDelete('cascade');
        $table->enum('gender', array('male','female'));
        $table->date('date_of_birth');
        $table->string('address');
        $table->string('postal_code',15);
        $table->string('bloodtype');
        $table->string('guardian1_name');
        $table->string('guardian1_contact_no',15);
        $table->string('relationship1');
        $table->string('guardian2_name');
        $table->string('guardian2_contact_no',15);
        $table->string('relationship2');
        $table->string('drugs_allergy');
        $table->string('medical_condition');
        $table->string('height');
        $table->string('weight');
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
        Schema::dropIfExists('c_students');
    }
}
