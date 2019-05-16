<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('title')->default('');
            $table->timestamps();

        });

        Schema::create('banners', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('banner_category_id')->nullale();
            $table->foreign('banner_category_id')
                  ->references('id')
                  ->on('banner_categories')
                  ->onDelete('cascade');

            $table->unsignedInteger('banner_image_id')->nullable();

            $table->foreign('banner_image_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');

            $table->json('options')->nullable();

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

        Schema::dropIfExists('banners');
        Schema::dropIfExists('banner_categories');
    }
}
