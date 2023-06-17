<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-17T15:05                                             |
|--------------------------------------------------------------------------|
*/
class Customers extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var name string 
* @var phone string 
* @var address string 
*/
    protected $table =  'customers';
    protected $fillable = [
'code',  
'name',  
'phone',  
'address',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'name',  
'phone',  
'address',  

    ];
}

            