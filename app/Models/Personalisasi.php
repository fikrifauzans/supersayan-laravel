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

class Personalisasi extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var name string 
     * @var age integer 
     * @var kehamilan_ke integer 
     * @var usia_anak_terakhir integer 
     * @var hpht string 
     * @var usia_kehamilan integer 
     * @var gph string 
     * @var keluhan text 
     */
    protected $table =  'personalisasi';
    protected $fillable = [
        'name',
        'age',
        'kehamilan_ke',
        'usia_anak_terakhir',
        'hpht',
        'usia_kehamilan',
        'gph',
        'keluhan',
        'review',
        'verifikasi',

    ];


    protected $hidden = [];

    public $searchable = [
        'name',
        'age',
        'kehamilan_ke',
        'usia_anak_terakhir',
        'hpht',
        'usia_kehamilan',
        'gph',
        'keluhan',
        'review',
        'verifikasi',

    ];
}
