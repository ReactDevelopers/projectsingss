<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('title',255);
            $table->text('description');
            $table->string('target_group',255);
            $table->integer('duration')->unsigned();
            $table->enum('category',['Soft Skill','Safety','Adhoc','Foundation Program','Induction Program','WSQ','Procurement','Uncategorised']);
            $table->string('website',100)->nullable();
            $table->string('remark',800)->nullable();
            $table->text('special_requirement');
            $table->text('pre_requisite');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
