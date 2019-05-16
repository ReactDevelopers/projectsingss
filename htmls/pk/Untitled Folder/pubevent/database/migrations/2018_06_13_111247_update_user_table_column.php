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
            $table->integer('role_id')->after('pubnet_id')->nullable()->unsigned();
            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
            
            $table->dropForeign(['role_id']);
            $table->dropColumn('pubnet_id');
            $table->dropColumn('num_success_login');
            $table->dropColumn('last_success_login_attemp');
            $table->dropColumn('role_id');
            $table->dropColumn('deleted_at');
        });
    }
}
