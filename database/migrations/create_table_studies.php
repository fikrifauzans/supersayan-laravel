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
| generate in 2023-05-16T20:39                                             |
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
Schema::dropIfExists('studies');
Schema::create('studies', function (Blueprint $table) {
    $table->id();
    
    $table->string('code')->nullable();
    $table->string('name')->nullable();
    $table->text('remark')->nullable();
    $table->string('color')->nullable();
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
