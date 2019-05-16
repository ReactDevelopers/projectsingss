<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColCanWorkName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropForeign(['institute_id']);
            $table->dropColumn('institute_id');
            $table->string('name_at_work')->after('name')->nullable();
            $table->json('options')->after('status')->nullable();
            $table->json('institute_ids')->after('role_id')->nullable();
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->enum('upload_document',['true','false'])->default('false')->nullable();
        });

        Schema::table('professions', function (Blueprint $table) {
            $table->enum('can_work_at',['true','false'])->default('false')->nullable();
        });

        Schema::table('user_certificates', function (Blueprint $table) {
            $table->enum('is_valid',['true','false'])->default('false')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name_at_work');
            $table->dropColumn('institute_ids');
            $table->dropColumn('options');
            $table->string('first_name')->after('name')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->unsignedInteger('institute_id')->nullable()->after('role_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('upload_document');
        });

        Schema::table('professions', function (Blueprint $table) {
            $table->dropColumn('can_work_at');
        });

        Schema::table('user_certificates', function (Blueprint $table) {
            $table->dropColumn('is_valid');
        });
    }
}
