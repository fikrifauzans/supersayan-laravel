<?php

namespace App\Repositories\V1\Eloquent;

use App\Repositories\V1\Contracts\EloquentBaseRepository;
use App\Models\Model;
use App\Service\System\FileSystem;
use App\Service\System\SystemInfo;
use App\Service\System\SystemQuery;
use App\Service\System\RelationFunctions;
use App\Models\Files;

class BaseRepository implements EloquentBaseRepository
{
    use SystemQuery,
        SystemInfo,
        RelationFunctions,
        FileSystem;

    protected $model;
    public $files;
    public $dataFile;

    public function __construct($model, Files $files)
    {
        $this->model = $model; // --> Init Model
        //------------------------------------------------------
        //                      File Handler                   |
        //------------------------------------------------------
        $this->files = $files; // --> Untuk Store Ke Master Files
        $this->dataFile = []; // --> Init Data File di FileSystem
    }


    // Get Index, Baca Di Dokumentasi Nanti-------------------------------
    public function get($rawRequest = [], array $relations = [] , $relationQueries = [])
    {
        try {
            // Kontrol untuk query base
            if ($rawRequest) return $this->queryController($this->model, $rawRequest, $relations, $relationQueries);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    // Cari Id ------------------------------------------------------------
    public function findId($id = 0,  $withTrash = false,  $relations = [])
    {
        try {
            if ($withTrash) return $this->model->with($relations)->withTrashed()->findOrFail($id);
            else return  $this->model->with($relations)->findOrFail($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    // Update Or Create ----------------------------------------------------
    public function updateOrCreate($id,  $data, $childs = [])
    {
        try {
            $val = [];
            if ($id !== null) $val = $this->findId($id)->fill($data);
            else $val = $this->model->create($data);
            $val->save();
            if ($childs != null) {
                foreach ($childs as $key => $value) {
                    $this->childsChecker([$key => $value], $val['id']);
                }
            }
            $this->model->fresh();
            return $val;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    // Delete Data -----------------------------------------------------------
    public function destroy($id = 0, bool $permanent = false)
    {
        $data =  $this->findId($id, $permanent);
        try {
            if ($permanent) return $data->forceDelete(); // --> Permanent Delete()
            else return $data->delete();                 // --> use SoftDelete()
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Restore Data ---------------------------------------------------------
    public function restore(int $id = 0)
    {
        $data = $this->findId($id, true);
        try {
            return $data->restore();   // --> Restore data kalo pake soft delete()
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insert($request)
    {
        try {
            //code...
            return $this->model->insert($request);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
