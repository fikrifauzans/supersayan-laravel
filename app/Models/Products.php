<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-17T15:05                                             |
|--------------------------------------------------------------------------|
*/

class Products extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var category_id integer 
     * @var code string 
     * @var name string 
     * @var price double 
     * @var stock integer 
     * @var remark text 
     */
    protected $table =  'products';
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'price',
        'stock',
        'remark',

    ];


    protected $hidden = [];

    public $searchable = [
        'category_id',
        'code',
        'name',
        'price',
        'stock',
        'remark',

    ];

    protected $appends = [
        'category_name'
    ];

    public function getCategoryNameAttribute()
    {
        if ($this->category_id != null) {
            return Categories::find($this->category_id)->name;
        };
    }
}
