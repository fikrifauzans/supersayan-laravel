<?php

namespace App\Http\Controllers;

use App\Repositories\V1\Eloquent\Auth\SupersayanRepository;
use Illuminate\Support\Facades\Artisan;


class InitController extends Controller
{
    public  $repository;

    public function __construct(SupersayanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function init()
    {
        // try {
        Artisan::call('migrate:fresh', [
            '--path' => 'database/migrations/auth',
            '--force'     => true,
            '--seed'      => true,

        ]);
        Artisan::call('migrate', [
            '--path' => 'database/migrations',


        ]);
        Artisan::call('laravolt:indonesia:seed');
        $this->repository->init();
        return  $this->repository->getMaster();
    }
}
