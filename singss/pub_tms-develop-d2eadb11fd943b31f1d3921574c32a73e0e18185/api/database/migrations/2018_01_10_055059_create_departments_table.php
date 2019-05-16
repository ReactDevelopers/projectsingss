<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{

    public function up()
    {
        Schema::create('departments', function(Blueprint $table) {
            
            $table->increments('id');
            $table->string('name', 255);
            $table->string('oganization_code',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('departments');
    }
}
