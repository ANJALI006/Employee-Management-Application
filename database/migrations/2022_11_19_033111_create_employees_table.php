<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('first_name');
            $table->text('last_name');
            $table->date('joining_date');
            $table->date('dob');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->boolean('gender')->comment('0:Male,1:Female,2:Others');
            $table->string('mobile_number', 20);
            $table->string('land_line', 20);
            $table->string('email', 50);
            $table->text('present_address');
            $table->boolean('same_as_present_address')->default(0)->comment('0:No,1:Yes');
            $table->text('permanent_address');
            $table->boolean('status')->default(1)->comment('0:Inactive,1:Active');
            $table->text('profile_picture');
            $table->text('resume');
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
        Schema::dropIfExists('employees');
    }
};
