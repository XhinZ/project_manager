<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskSkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_skill', function (Blueprint $table) {

            $table->integer('skill_id')->unsigned();
        $table->integer('task_id')->unsigned();
        $table->string('end_time');
        $table->foreign('skill_id')->references('id')->on('skills')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('task_id')->references('id')->on('tasks')
            ->onUpdate('cascade')->onDelete('cascade');
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
    }
}
