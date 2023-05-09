<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\MenuDetails;
use App\Repositories\V1\Interface\Auth\IMenuDetailsRepository;
use App\Repositories\V1\Eloquent\BaseRepository;


class MenuDetailsRepository extends BaseRepository implements IMenuDetailsRepository
{
    protected $model;

    public function __construct(MenuDetails $model)
    {
        $this->model = $model;
    }
}
