<?php

namespace App\Repositories\V1\Eloquent\Transaction;

use App\Models\TransactionDetails;
use App\Repositories\V1\Eloquent\BaseRepository;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-17T19:18                                             |
|--------------------------------------------------------------------------|
*/
class TransactionDetailsRepository extends BaseRepository 
{
    protected $model;

    public function __construct(TransactionDetails $model)
    {
    $this->model = $model;
    }
    
}