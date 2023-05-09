<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Files extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table =  'files';

    protected $casts = [
        'reference_id' => 'integer',

    ];

    protected $fillable = [
        'name',
        'reference_table',
        'reference_id',
        'path',
        'directory',
        'description',
        'type'
    ];


    protected $hidden = [];

    public $searchable = [
        'name',
        'reference_table',
        'path',
        'directory',
        'description',
        'type'
    ];
}
