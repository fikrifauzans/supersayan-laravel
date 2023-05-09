<?php

namespace App\Service\System;

use App\Services\Helper\Helper;

trait RelationFunctions
{
    // Check Child yang terupdate
    public function childsChecker($childs, $id)
    {
        $arrayKeys = []; // Simpen Dulu Takut Kepake
        $data = $this->findId($id);
        foreach ($childs as $key => $c) {

            // DELETE -------------------------------------------------
            $idsChilds = [];
            if ($c) $idsChilds = array_column($c, 'id');                         // Tampung Id yang ada
            array_push($arrayKeys, $key);
            // if ($idsChilds !== []) $data =

            $data = $this->destroyWhereNotId($idsChilds, $data, $key);  // Untuk Delete WhereNotIn - ids
            $data = $this->updateOrCreateChilds($data, $key, $c);        //Update Atau Create (Kalau Tidak ada id)

            // ---------------------------------------------------------

        }
    }

    public function destroyWhereNotId($idsChilds, $data, $key)
    {
        // dd(Helper::T_DefaultRelation($key));
        $data[Helper::T_DefaultRelation($key)]
            ->whereNotIn('id', $idsChilds)
            ->each(function ($val) {
                if ($val) $val->forceDelete();
            });
        return $data;
    }

    public function updateOrCreateChilds($data, $key, $c)
    {
        $data = $this->model->find($data['id']);
        foreach ($c as $k => $item) {
            if (isset($item['id'])) {
                $data[Helper::T_DefaultRelation($key)]
                    ->find($item['id'])
                    ->update($item);
            } else {
                $data->{Helper::T_DefaultRelation($key)}()
                    ->create($item);
            }
        }
    }
}
