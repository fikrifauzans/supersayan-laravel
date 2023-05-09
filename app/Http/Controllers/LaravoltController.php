<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LaravoltController extends Controller
{
    //
    public function cities(Request $request)
    {

        # code...
        if ($request['search']) return response()->json(['status' => 200, 'massage' => 'success', 'data' =>  ['data' => \Indonesia::search($request['search'])->allCities()]], 200);
        else return  response()->json(['status' => 200, 'massage' => 'success', 'data' => ['data' => \Indonesia::allCities()]], 200);
    }

    public function provinces(Request $request)
    {
        # code...
        if ($request['search']) return response()->json(['status' => 200, 'massage' => 'success', 'data' => ['data' =>  \Indonesia::search($request['search'])->allProvinces()]], 200);
        else return  response()->json(['status' => 200, 'massage' => 'success', 'data' => ['data' =>  \Indonesia::allProvinces()]], 200);
    }
}
