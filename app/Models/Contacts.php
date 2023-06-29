<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Users;
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-06-29T10:55                                             |
|--------------------------------------------------------------------------|
*/

class Contacts extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var phone string 
     * @var city string 
     * @var province string 
     * @var adress text 
     * @var user_id integer 
     */
    protected $table =  'contacts';
    protected $fillable = [
        'phone',
        'city',
        'province',
        'adress',
        'user_id',

    ];


    protected $hidden = [];

    public $searchable = [
        'phone',
        'city',
        'province',
        'adress',
        'user_id',

    ];

    /**
     * Get the user that owns the Contacts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}
