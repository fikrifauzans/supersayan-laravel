<?php

namespace App\Repositories\V1\Eloquent\Master;

use App\Models\LessonTimetable;
use App\Repositories\V1\Eloquent\BaseRepository;
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
class LessonTimetableRepository extends BaseRepository 
{
    protected $model;

    public function __construct(LessonTimetable $model)
    {
    $this->model = $model;
    }
    
}