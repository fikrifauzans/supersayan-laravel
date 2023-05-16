<?php

namespace App\Repositories\V1\Eloquent\Master;

use App\Models\Classes;
use App\Repositories\V1\Eloquent\BaseRepository;
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
class ClassesRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Classes $model)
    {
    $this->model = $model;
    }
    
}