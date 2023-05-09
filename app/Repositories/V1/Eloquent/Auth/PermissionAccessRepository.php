<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\PermissionAccess;
use App\Repositories\V1\Interface\Auth\IPermissionAccessRepository;
use App\Repositories\V1\Eloquent\BaseRepository;


class PermissionAccessRepository extends BaseRepository
{
    protected $model;

    public function __construct(PermissionAccess $model)
    {
        $this->model = $model;
    }
}
