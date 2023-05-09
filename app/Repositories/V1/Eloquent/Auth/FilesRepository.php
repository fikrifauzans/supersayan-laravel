<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Files;
use App\Repositories\V1\Interface\Auth\IFilesRepository;
use App\Repositories\V1\Eloquent\BaseRepository;


class FilesRepository extends BaseRepository 
{
    protected $model;

    public function __construct(Files $model)
    {
        $this->model = $model;
    }
}
