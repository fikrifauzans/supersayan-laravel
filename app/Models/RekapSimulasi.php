<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RekapSimulasi extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table =  'rekap_simulasi';



    protected $fillable = [
        'user_id',
        'total_pertanyaan',
        'jawaban_benar',
        'jawaban_salah',
        'persentasi_skor',
        'details'
    ];


    protected $casts = [
        'details' => 'object'
    ];

    protected $hidden = [];

    public $searchable = [
        'user_id',
        'total_pertanyaan',
        'jawaban_benar',
        'jawaban_salah',
        'persentasi_skor',
        'details'
    ];
}
