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
| generate in 2023-06-17T14:43                                             |
|--------------------------------------------------------------------------|
*/
class Categories extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var group string 
* @var code string 
* @var name string 
* @var remark text 
*/
    protected $table =  'categories';
    protected $fillable = [
'group',  
'code',  
'name',  
'remark',  

    ];


    protected $hidden = [];

    public $searchable = [
'group',  
'code',  
'name',  
'remark',  

    ];
}

            