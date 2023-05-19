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
Schema::dropIfExists('schools');
Schema::create('schools', function (Blueprint $table) {
    $table->id();
    
    $table->string('code')->nullable();
    $table->string('name')->nullable();
    $table->text('address')->nullable();
    $table->string('city')->nullable();
    $table->string('province')->nullable();
    $table->string('long')->nullable();
    $table->string('lat')->nullable();
    $table->integer('logo_id')->nullable();
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
