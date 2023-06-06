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
| generate in 2023-06-06T16:57                                             |
|--------------------------------------------------------------------------|
*/
class Simulasi extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var parent_id integer 
* @var name string 
* @var answer_value string 
* @var value string 
*/
    protected $table =  'simulasi';
    protected $fillable = [
'parent_id',  
'name',  
'answer_value',  
'value',  

    ];


    protected $hidden = [];

    public $searchable = [
'parent_id',  
'name',  
'answer_value',  
'value',  

    ];
}

            