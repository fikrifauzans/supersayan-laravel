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
| generate in 2023-06-17T14:43                                             |
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
Schema::dropIfExists('products');
Schema::create('products', function (Blueprint $table) {
    $table->id();
    
    $table->text('category_id')->nullable();
    $table->string('code')->nullable();
    $table->string('name')->nullable();
    $table->string('price')->nullable();
    $table->integer('stock')->nullable()->default(0);
    $table->text('remark')->nullable();
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
