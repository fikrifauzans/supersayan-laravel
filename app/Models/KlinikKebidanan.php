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
class KlinikKebidanan extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var name string 
* @var description text 
*/
    protected $table =  'klinik_kebidanan';
    protected $fillable = [
'name',  
'description',  

    ];


    protected $hidden = [];

    public $searchable = [
'name',  
'description',  

    ];
}

            