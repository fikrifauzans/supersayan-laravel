<?php

namespace App\Service\System;

use App\Services\Helper\Helper;

trait SystemQuery
{

    public function queryController($data, $queries = [], array $relations = [], $relationQuery = [])
    {
        if ($queries['select'])         $data = $this->querySelect($data, $queries['select']);

        if ($queries['search'])         $data = $this->queryFindInAll($data, $queries['search'], $relationQuery);

        if ($queries['where'])          $data = $this->queryWhere($data, $queries['where']);

        if ($queries['like'])           $data = $this->queryLike($data, $queries['like']);

        if ($queries['trash'] == true)  $data = $data->onlyTrashed();

        if ($queries['order'])          $data = $this->queryOrderBy($data, $queries['order']);

        if ($queries['limit'])          $data = $this->queryLimit($data, $queries['limit']);

        if (isset($queries['table']))    return $this->dataTable($data->with($relations), $queries['limit']);

        else                            return $data->with($relations)->get();
    }

    public function querySelect($data, $query)
    {
        $queryParticle = explode(',', $query);

        return $data->select($queryParticle);
    }

    public function queryWhere($data, string $query)
    {
        $queryParticle = explode('|', $query);

        if ($queryParticle) {

            foreach ($queryParticle as $key => $value) {

                $queryMicroParticle =  explode(':', $value);

                if ($queryMicroParticle && $queryMicroParticle[0]) $queryKey = $queryMicroParticle[0];

                if ($queryMicroParticle && $queryMicroParticle[1]) $queryValue = $queryMicroParticle[1];

                $queryWhere[$queryKey] = $queryValue;
            }
        }


        $data = $data->where($queryWhere);

        return $data;
    }

    public function queryLike($data, string $query)
    {
        $queryParticle = explode('|', $query);

        if ($queryParticle) {

            foreach ($queryParticle as $key => $value) {

                $queryMicroParticle =  explode(':', $value);

                if (strpos($queryMicroParticle[0], '-') != false) $data = $this->queryWhereHas($data, $queryMicroParticle);

                else {

                    if ($queryMicroParticle && $queryMicroParticle[0]) $queryKey = $queryMicroParticle[0];

                    if ($queryMicroParticle && $queryMicroParticle[1]) $queryValue = $queryMicroParticle[1];

                    $data =  $data->where($queryKey, 'Like', '%' . $queryValue . '%');
                }
            }
        }

        return $data;
    }
    public function queryFindInAll($data, string $query, $relationQuery)
    {
     

        $data = $data->where(function ($data) use ($query, $relationQuery) {

            $data = $data->where($this->model->searchable[0], 'Like', '%' . $query . '%');

            foreach ($this->model->searchable as $key => $value) {

                $data = $data->orWhere($this->model->searchable[$key], 'Like', '%' . $query . '%');
            };

            foreach ($relationQuery as $key => $value) {

                $data = $data->orWhereHas($value, function ($q) use ($query) {
        

                    foreach ($q->getModel()->searchable as $key => $v) {

                        if ($key == 0)  $q = $q->where($q->getModel()->searchable[0], 'Like', '%' . $query . '%');

                        else $q->orWhere($v, 'Like', '%' . $query . '%');
                    }
                });
            }
        });



        return $data;
    }

    public function queryOrderBy($data, string $query)
    {


        $order = explode(':', $query);

        if (strpos($order[0], '-') != false) $data = $this->queryWhereHasOrder($data, $order);

        else {
            $orderKey = $order[0];

            $orderValue = $order[1];

            $data =  $data->orderBy($orderKey, $orderValue);
        }

        return $data;
    }

    public function queryLimit($data, $limit)
    {
        if ($data) return $data->limit($limit);
    }

    public function dataTable($data, $limit = 0)
    {
        if ($limit == 0) return $data->paginate($data->count());

        else return $data->paginate($limit);
    }

    public function queryWhereHas($data, $queryKeyAndValue)
    {


        $fieldAndKey = explode('-', $queryKeyAndValue[0]);

        $queryValue = $queryKeyAndValue[1];

        $field = $fieldAndKey[0];

        $key = $fieldAndKey[1];

        // dd($field);

        return $data->whereHas(Helper::T_DefaultRelation($field), function ($query) use ($key, $queryValue) {

            $query->where($key, 'Like', '%' . $queryValue . '%');
        });
    }
    public function queryWhereHasOrder($data, $queryKeyAndValue)
    {

        $fieldAndKey = explode('-', $queryKeyAndValue[0]);

        $queryValue = $queryKeyAndValue[1];

        $field = $fieldAndKey[0];

        $key = $fieldAndKey[1];

        return $data->whereHas(Helper::T_DefaultRelation($field), function ($query) use ($key, $queryValue) {

            $query->orderBy($key, $queryValue);
        });
    }
}
