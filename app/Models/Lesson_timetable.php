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
| generate in 2023-05-16T21:07                                             |
|--------------------------------------------------------------------------|
*/
class Lesson_timetable extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var name string 
* @var grade string 
* @var remark text 
*/
    protected $table =  'lesson_timetable';
    protected $fillable = [
'code',  
'name',  
'grade',  
'remark',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'name',  
'grade',  
'remark',  

    ];
}

            