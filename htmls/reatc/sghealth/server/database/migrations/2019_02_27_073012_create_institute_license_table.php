<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteLicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_license', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('institute_id');

            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('branch_id');
                $table->foreign('branch_id')
                    ->references('id')->on('branches')
                    ->onDelete('cascade');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->unsignedInteger('certificate_id');
            $table->foreign('certificate_id')
                ->references('id')->on('certificates')
                ->onDelete('cascade');

            $table->date('expiry_date')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->timestamps();

            $table->unique(['branch_id', 'service_id', 'certificate_id'], 'institute_license_bsc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institute_license');
    }
}
