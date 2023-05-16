<?php

namespace App\Repositories\V1\Eloquent\Master;

use App\Models\Lesson_timetable;
use App\Repositories\V1\Eloquent\BaseRepository;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-05-16T20:30                                             |
|--------------------------------------------------------------------------|
*/
class Lesson_timetableRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Lesson_timetable $model)
    {
    $this->model = $model;
    }
    
}