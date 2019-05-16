<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SgHealthUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->char('mobile_no', 15)->nullable()->after('remember_token');
            $table->timestamp('mobile_verified_at')->nullable()->after('mobile_no');

            $table->unsignedInteger('role_id')->after('mobile_verified_at');
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->unsignedInteger('institute_id')->nullable()->after('role_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('branch_id')->nullable()->after('institute_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->unsignedInteger('profession_id')->after('branch_id');
            $table->foreign('profession_id')
                ->references('id')->on('professions')
                ->onDelete('cascade');

            $table->unsignedInteger('profile_pic_id')->nullable()->after('profession_id');
            $table->foreign('profile_pic_id')
                ->references('id')->on('media')
                ->onDelete('set null');

            $table->json('service_ids')->nullable()->after('profile_pic_id');
            $table->char('employee_id', 20)->nullable()->after('service_ids');
            $table->unique(['branch_id', 'employee_id']);


            $table->enum('status',['Active', 'Inactive'])->default('Active')->after('employee_id');
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('mobile_no');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');

            $table->dropForeign(['institute_id']);
            $table->dropColumn('institute_id');

            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');

            $table->dropForeign(['profession_id']);
            $table->dropColumn('profession_id');

            $table->dropForeign(['profile_pic_id']);
            $table->dropColumn('profile_pic_id');

            $table->dropColumn('service_ids');
            $table->dropColumn('mobile_verified_at');
            $table->dropColumn('status');
            $table->dropColumn('employee_id');
            $table->dropColumn('deleted_at');
        });
    }
}
