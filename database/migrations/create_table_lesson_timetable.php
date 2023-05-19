<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;      
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-05-18T07:57                                             |
|--------------------------------------------------------------------------|
*/
return new class extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::dropIfExists('lesson_timetable');
Schema::create('lesson_timetable', function (Blueprint $table) {
    $table->id();
    
    $table->string('code')->nullable();
    $table->integer('teacher_id')->nullable();
    $table->integer('class_id')->nullable();
    $table->integer('study_id')->nullable();
    $table->string('smester')->nullable();
    $table->string('start_time')->nullable();
    $table->string('end_time')->nullable();
    $table->string('year')->nullable();
    $table->integer('sort')->nullable();
    $table->integer('day')->nullable();
    $table->softDeletes();
    $table->timestamps();
    $table->integer('created_by')->nullable();
    $table->integer('updated_by')->nullable();
    $table->integer('deleted_by')->nullable();
});
}
            
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
}
};
