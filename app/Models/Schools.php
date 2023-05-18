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
| generate in 2023-05-18T07:57                                             |
|--------------------------------------------------------------------------|
*/
class Schools extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var name string 
* @var address text 
* @var city string 
* @var province string 
* @var long string 
* @var lat string 
* @var logo_id integer 
*/
    protected $table =  'schools';
    protected $fillable = [
'code',  
'name',  
'address',  
'city',  
'province',  
'long',  
'lat',  
'logo_id',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'name',  
'address',  
'city',  
'province',  
'long',  
'lat',  
'logo_id',  

    ];
}

            