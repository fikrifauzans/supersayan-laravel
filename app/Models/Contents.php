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
class Contents extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var code string 
* @var parent_id integer 
* @var group string 
* @var name string 
* @var page string 
* @var device string 
* @var title string 
* @var subtitle string 
* @var description string 
* @var path string 
* @var link string 
* @var sort string 
* @var remark text 
* @var details text 
* @var photo_id integer 
*/
    protected $table =  'contents';
    protected $fillable = [
'code',  
'parent_id',  
'group',  
'name',  
'page',  
'device',  
'title',  
'subtitle',  
'description',  
'path',  
'link',  
'sort',  
'remark',  
'details',  
'photo_id',  

    ];


    protected $hidden = [];

    public $searchable = [
'code',  
'parent_id',  
'group',  
'name',  
'page',  
'device',  
'title',  
'subtitle',  
'description',  
'path',  
'link',  
'sort',  
'remark',  
'details',  
'photo_id',  

    ];
}

            