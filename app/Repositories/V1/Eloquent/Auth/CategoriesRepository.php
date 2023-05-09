<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Categories;
use App\Repositories\V1\Eloquent\BaseRepository;


class CategoriesRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Categories $model)
    {
        $this->model = $model;
    }
}
