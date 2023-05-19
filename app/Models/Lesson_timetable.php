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
| generate in 2023-05-18T07:56                                             |
|--------------------------------------------------------------------------|
*/

class Lesson_timetable extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
     * @var teacher_id integer 
     * @var class_id integer 
     * @var study_id integer 
     * @var smester string 
     * @var start_time string 
     * @var end_time string 
     * @var year string 
     * @var sort integer 
     * @var day integer 
     */
    protected $table =  'lesson_timetable';
    protected $fillable = [
        'code',
        'teacher_id',
        'class_id',
        'study_id',
        'smester',
        'start_time',
        'end_time',
        'year',
        'sort',
        'day',

    ];


    protected $hidden = [];

    public $searchable = [
        'code',
        'teacher_id',
        'class_id',
        'study_id',
        'smester',
        'start_time',
        'end_time',
        'year',
        'sort',
        'day',

    ];
}
