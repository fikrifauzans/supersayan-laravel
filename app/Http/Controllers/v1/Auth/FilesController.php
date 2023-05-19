<?php

namespace App\Http\Controllers\v1\Auth;

use App\Repositories\V1\Eloquent\Auth\FilesRepository;
use Illuminate\Http\Request;
use App\Services\Helper\Helper;
use App\Services\Handler\JsonResponse as JsonCustomResponse;
use App\Services\Validator\CustomValidator;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\V1\Auth\Controller;

// use App\User;

class FilesController extends Controller
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

    public function __construct(FilesRepository $repository, CustomValidator $validator, JsonCustomResponse $response)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->response = $response;
    }


    public function index(Request $request, $language)
    {
        $method = Helper::T_getCurrentUrl($request->url()) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        $relations = $request->relations ? Helper::getRelations($request) : $this->relations;

        return $this->response->choseLang($language)->modeMessage('index', $this->repository->getTableName())->success($this->repository->get($request, $relations));
    }

    public function show($language, $id, Request $request)
    {
        $method = Helper::T_getCurrentUrl($request->url(), 1) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        return $this->response->choseLang($language)->modeMessage('show', $this->repository->getTableName())->success($this->repository->findId($id, false));
    }

    public function store(Request $request, $language)
    {

        $method = Helper::T_getCurrentUrl($request->url()) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        $validated = $this->validator->validate($request, $language, $this->repository->getTableName());

        if ($validated->fails()) return response()->json(['errors' => $validated->errors()], 422);

        else return $this->response->choseLang($language)->modeMessage('create', $this->repository->getTableName())->success($this->repository->moveImage($request, 'file')->storeFile(null, 'files', $request['description']));
    }

    public function update(Request $request,  $language, $id)
    {
        $method = Helper::T_getCurrentUrl($request->url(), 1) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        $validated = $this->validator->validate($request, $language, $this->repository->getTableName());

        if ($validated->fails()) return response()->json(['errors' => $validated->errors()], 422);

        return $this->response->choseLang($language)->modeMessage('update', $this->repository->getTableName())->success($this->repository->updateFile($id, $request, 'file'));
    }

    public function destroy($language, $id, Request $request)
    {
        $method = Helper::T_getCurrentUrl($request->url(), 1) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        if ($this->repository->destroy($id)) return $this->response->choseLang($language)->modeMessage('delete', $this->repository->getTableName())->success([]);
    }

    public function force($language, $id, Request $request)
    {
        $method = Helper::T_getCurrentUrl($request->url(), 2) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        $this->repository->forceFile($id);

        return $this->response->choseLang($language)->modeMessage('force', 'files')->success([]);
    }

    public function restore($language, $id, Request $request)
    {
        $method = Helper::T_getCurrentUrl($request->url(), 2) . '-' . $request->route()->getActionMethod();

        if (Gate::denies('permission',  $method)) return $this->response->error($language, 'permission-denied');

        if ($this->repository->restore($id)) return  $this->response->choseLang($language)->modeMessage('restore', $this->repository->getTableName())->success($this->repository->findId($id, false));
    }
}
