<?php

namespace App\Http\Controllers\v1\Master;
            
use App\Http\Controllers\V1\Auth\Controller;
use App\Repositories\V1\Eloquent\Master\ClassesRepository;
use Illuminate\Http\Request;
use App\Services\Helper\Helper;
use App\Services\Handler\JsonResponse as JsonCustomResponse;
use App\Services\Validator\CustomValidator;
use Illuminate\Support\Facades\Gate;
            
/*
|--------------------------------------------------------------------------|
| Supersayan Initator                                                      |
|--------------------------------------------------------------------------|
| This page gererated by Fikri Fauzan in Supersayan initator function.     |
| if you have question, you can contact me as administrator by email in    |
| fikrifauzans.goku@gmail.com - @Supersayan Basecode Architecture          |
|                                                                          |
| generate in 2023-05-18T07:57                                             |
|--------------------------------------------------------------------------|
*/

// use App\User;
            
class ClassesController extends Controller
    {
    /**
    * Retrieve the user for the given ID.
    *
    * @param  int  $id
    * @return Response
    */
                
    protected $repository;
    protected $validator;
    protected $response;
    protected $relations = [];
                
    public function __construct(ClassesRepository $repository, CustomValidator $validator, JsonCustomResponse $response)
    {
        $this->repository = $repository;
        $this->validator =  $validator;
        $this->response =  $response;
    }
                
    public function index(Request $request, $language)
    {
            
                
        if (Gate::denies('permission',  'classes-index' )) return $this->response->error($language, 'permission-denied');
                
        $relations = $request->relations ? Helper::getRelations($request) : $this->relations;
                
        return $this->response->choseLang($language)->modeMessage('index', $this->repository->getTableName())->success($this->repository->get($request, $relations));
    }
                
    public function show($language, $id, Request $request)
    {
                
        if (Gate::denies('permission',  'classes-show' )) return $this->response->error($language, 'permission-denied');
                
        return $this->response->choseLang($language)->modeMessage('show', $this->repository->getTableName())->success($this->repository->findId($id, false));
    }
                
    public function store(Request $request, $language)
    {
                
        if (Gate::denies('permission',  'classes-store' )) return $this->response->error($language, 'permission-denied');
                
        // $validated = $this->validator->validate($request, $language, $this->repository->getTableName());
                
        // if ($validated->fails()) return response()->json(['errors' => $validated->errors()], 422);
                
        return $this->response->choseLang($language)->modeMessage('create', $this->repository->getTableName())->success($this->repository->updateOrCreate(null, $request->all()));
    }
                
    public function update(Request $request,  $language, $id)
    {
                
        if (Gate::denies('permission',  'classes-update' )) return $this->response->error($language, 'permission-denied');
                
        // $validated = $this->validator->validate($request, $language, $this->repository->getTableName());
                
        // if ($validated->fails()) return response()->json(['errors' => $validated->errors()], 422);
                
        return $this->response->choseLang($language)->modeMessage('update', $this->repository->getTableName())->success($this->repository->updateOrCreate($id, $request->all()));
    }
                
    public function destroy($language, $id, Request $request)
    {
                
        if (Gate::denies('permission',  'classes-destroy' )) return $this->response->error($language, 'permission-denied');
                
        if ($this->repository->destroy($id)) return $this->response->choseLang($language)->modeMessage('delete', $this->repository->getTableName())->success([]);
    }
                
    public function force($language, $id, Request $request)
    {
                
        if (Gate::denies('permission',  'classes-force' )) return $this->response->error($language, 'permission-denied');
                
        if ($this->repository->destroy($id, true)) return $this->response->choseLang($language)->modeMessage('force', $this->repository->getTableName())->success([]);
    }
                
    public function restore($language, $id, Request $request)
    {
                
        if (Gate::denies('permission',  'classes-restore' )) return $this->response->error($language, 'permission-denied');
                
        if ($this->repository->restore($id)) return  $this->response->choseLang($language)->modeMessage('restore', $this->repository->getTableName())->success($this->repository->findId($id, false));
    }
}