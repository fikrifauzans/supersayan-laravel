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
| generate in 2023-05-16T21:07                                             |
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
Schema::dropIfExists('presences');
Schema::create('presences', function (Blueprint $table) {
    $table->id();
    
    $table->string('code')->nullable();
    $table->integer('user_id')->nullable()->default(0);
    $table->integer('role_id')->nullable()->default(0);
    $table->integer('school_id')->nullable()->default(0);
    $table->integer('study_id')->nullable()->default(0);
    $table->string('status')->nullable();
    $table->dateTime('datetime')->nullable();
    $table->text('remark')->nullable();
    $table->text('details')->nullable();
    $table->string('lat')->nullable();
    $table->string('long')->nullable();
    $table->softDeletes();
    $table->timestamps();
    $table->integer('created_by')->nullable()->default(0);
    $table->integer('updated_by')->nullable()->default(0);
    $table->integer('deleted_by')->nullable()->default(0);
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
