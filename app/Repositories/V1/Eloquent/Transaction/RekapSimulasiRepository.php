<?php

namespace App\Repositories\V1\Eloquent\Transaction;

use App\Models\RekapSimulasi;
use App\Models\Simulasi;
use App\Repositories\V1\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

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

class RekapSimulasiRepository extends BaseRepository
{
    protected $model;

    public function __construct(RekapSimulasi $model)
    {
        $this->model = $model;
    }


    public function transformStore($request)
    {
        #INIT
        $simulasi =  Simulasi::all();
        $total_pertanyaan =  count($simulasi);
        $jawaban_benar    = 0;
        $jawaban_salah    = 0;
        $persentasi_skor  = 0;
        $details          = $request;
        

        # LOOPING CARI JAWABAN 
        foreach ($request['answers'] as $key => $value) {
            $s  = Simulasi::find($value['id']);
            if (isset($s)) {
                if ($s['answer_value'] == $value['answer_value']) $jawaban_benar += 1;
                else $jawaban_salah += 1;
            }
        }

        # RUMUS KALKULASI SOAL
        $persentasi_skor =  (($jawaban_benar /  $total_pertanyaan) * 100);

        # CRETAE 
        return $this->updateOrCreate(null, [
            'user_id'          => Auth::user()->id,
            'total_pertanyaan' => $total_pertanyaan,
            'jawaban_benar'    => $jawaban_benar,
            'jawaban_salah'    => $jawaban_salah,
            'persentasi_skor'  => $persentasi_skor,
            'details'          => $details
        ]);
    }
}
