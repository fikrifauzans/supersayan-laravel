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
| generate in 2023-06-06T16:57                                             |
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
Schema::dropIfExists('personalisasi');
Schema::create('personalisasi', function (Blueprint $table) {
    $table->id();
    
    $table->string('name')->nullable();
    $table->integer('age')->nullable()->default(0);
    $table->integer('kehamilan_ke')->nullable()->default(0);
    $table->integer('usia_anak_terakhir')->nullable()->default(0);
    $table->string('hpht')->nullable();
    $table->integer('usia_kehamilan')->nullable()->default(0);
    $table->string('gph')->nullable();
    $table->text('keluhan')->nullable();
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
