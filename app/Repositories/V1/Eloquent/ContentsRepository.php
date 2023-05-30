<?php

namespace App\Repositories\Master\V1\Eloquent;

use App\Models\Contents;
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

class ContentsRepository extends BaseRepository
{
    protected $model;

    public function __construct(Contents $model)
    {
        $this->model = $model;
    }


    public function getContentGroup()
    {
     
    }
}
