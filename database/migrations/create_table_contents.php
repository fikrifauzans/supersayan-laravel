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
Schema::dropIfExists('contents');
Schema::create('contents', function (Blueprint $table) {
    $table->id();
    
    $table->string('code')->nullable();
    $table->integer('parent_id')->nullable();
    $table->string('group')->nullable();
    $table->string('name')->nullable();
    $table->string('page')->nullable();
    $table->string('device')->nullable();
    $table->string('title')->nullable();
    $table->string('subtitle')->nullable();
    $table->text('description')->nullable();
    $table->string('path')->nullable();
    $table->string('link')->nullable();
    $table->string('sort')->nullable();
    $table->text('remark')->nullable();
    $table->text('details')->nullable();
    $table->integer('photo_id')->nullable();
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
