<?php

namespace App\Repositories\V1\Eloquent\Transaction;

use App\Models\Konseling;
use App\Repositories\V1\Eloquent\BaseRepository;
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
class KonselingRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Konseling $model)
    {
    $this->model = $model;
    }
    
}