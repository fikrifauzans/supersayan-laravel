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
| generate in 2023-06-17T15:45                                             |
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
Schema::dropIfExists('transaction_details');
Schema::create('transaction_details', function (Blueprint $table) {
    $table->id();
    
    $table->integer('transaction_id')->nullable()->default(0);
    $table->integer('barang_id')->nullable()->default(0);
    $table->double('price')->nullable();
    $table->integer('qty')->nullable()->default(0);
    $table->double('discount_in_percent')->nullable();
    $table->double('discount_in_rupiah')->nullable();
    $table->double('amount')->nullable();
    $table->double('total')->nullable();
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
