<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 190)->unique();

            $table->unSignedInteger('post_type_id');

            $table->foreign('post_type_id')
            ->references('id')->on('post_types')
            ->onDelete('CASCADE');

            $table->string('title')->default('');
            $table->longText('content');
            $table->json('options')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
