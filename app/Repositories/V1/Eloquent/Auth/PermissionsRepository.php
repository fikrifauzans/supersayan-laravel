<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Permissions;
use App\Repositories\V1\Eloquent\BaseRepository;


class PermissionsRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Permissions $model)
    {
        $this->model = $model;
    }
}
