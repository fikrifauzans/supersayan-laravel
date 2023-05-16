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
| generate in 2023-05-16T20:39                                             |
|--------------------------------------------------------------------------|
*/
class Presences extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var user_id integer 
* @var role_id integer 
* @var school_id integer 
* @var study_id integer 
* @var status string 
* @var datetime dateTime 
* @var remark text 
* @var details text 
* @var lat string 
* @var long string 
*/
    protected $table =  'Presences';
    protected $fillable = [
'code',  
'user_id',  
'role_id',  
'school_id',  
'study_id',  
'status',  
'datetime',  
'remark',  
'details',  
'lat',  
'long',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'user_id',  
'role_id',  
'school_id',  
'study_id',  
'status',  
'datetime',  
'remark',  
'details',  
'lat',  
'long',  

    ];
}

            