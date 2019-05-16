<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstituteCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 190)->unique();
            $table->unsignedInteger('category_image_id')->nullable();
            $table->foreign('category_image_id')
                  ->references('id')
                  ->on('media')
                  ->onDelete('set null');

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
        //
        Schema::dropIfExists('institute_categories');
    }
}
