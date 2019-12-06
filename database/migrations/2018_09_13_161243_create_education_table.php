<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
			$table->string('institute');
            $table->string('sess');
            $table->enum('level',['ssc'	, 'dakhil'	,'O Level', 'hsc'	, 'alim'	, 'A Level','hons'	, 'fazil'	, 'masters'	, 'kamil'	, 'phd'	, 'diploma'	, 'postdiploma','Other']);
            $table->string('major');
            $table->text('description');
			$table->boolean('graduate')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

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
        Schema::dropIfExists('education');
    }
}
