<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Menus;
use App\Repositories\V1\Eloquent\BaseRepository;


class MenusRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Menus $model)
    {
        $this->model = $model;
    }
}
