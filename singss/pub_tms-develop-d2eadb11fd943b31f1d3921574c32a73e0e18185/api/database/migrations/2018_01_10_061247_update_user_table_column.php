<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->integer('pubnet_id')->unique()->after('email')->nullable()->unsigned();
            $table->integer('department_id')->after('pubnet_id')->nullable()->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('designation',255)->after('department_id')->nullable();
            $table->string('division',255)->after('designation')->nullable();
            $table->string('branch',255)->after('division')->nullable();
            $table->string('section',255)->after('branch')->nullable();

            $table->integer('role_id')->after('section')->nullable()->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->integer('num_success_login')->after('role_id')->default(0)->unsigned();
            $table->timestamp('last_success_login_attemp')->after('num_success_login')->nullable();
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
            
            $table->dropForeign(['department_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn('department_id');
            $table->dropColumn('pubnet_id');
            $table->dropColumn('designation');
            $table->dropColumn('division');
            $table->dropColumn('branch');
            $table->dropColumn('section');
            $table->dropColumn('num_success_login');
            $table->dropColumn('last_success_login_attemp');
            $table->dropColumn('role_id');
            $table->dropColumn('deleted_at');
        });
    }
}
