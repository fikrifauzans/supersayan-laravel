<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\MasterMenus;
use App\Models\MenuDetails;
use App\Repositories\V1\Eloquent\BaseRepository;


class MasterMenusRepository extends BaseRepository 
{
    protected $model;

    public function __construct(MasterMenus $model)
    {
        $this->model = $model;
    }

    public function updateOrCreateOnRepo($id, $request)
    {
        $data = $this->updateOrCreate($id, $request);
        $data = $this->model->find($data['id']);
        $this->updateOrCreateMenuDetails($request['menu_details'], $data);
        return $data;
    }

    public function updateOrCreateMenuDetails($menuDetails, $data)
    {

        // Delete Parent
        $idsChilds = array_column($menuDetails, 'id');
        $data->MenuDetails
            ->whereNotIn('id', $idsChilds)
            ->each(function ($val) {
                if ($val) $val->forceDelete();
            });
        foreach ($menuDetails as $key => $md) {
            if (isset($md['id'])) {
                $data->MenuDetails()->find($md['id'])->update($md);
                //DELETE CHILDS
                $idsMdChilds = array_column($md['childs'], 'id');
                $d = (MenuDetails::where('parent_id', $md['id'])
                    ->with('Menu')
                    ->get());

                $d->whereNotIn('id', $idsMdChilds)
                    ->each(function ($val) {
                        if ($val) $val->forceDelete();
                    });

                // Update Or Create
                foreach ($md['childs'] as $key => $c) {
                    $c['parent_id'] = $md['id'];
                    if (isset($c['id']) && $c['id'] != null) {
                        $c = MenuDetails::find($c['id'])->update($c);
                    } else {
                        $c = MenuDetails::create($c);
                    }
                }
            } else {
                // Create
                $created =  $data->MenuDetails()->create($md);
                $md['id'] = $created['id'];
                foreach ($md['childs'] as $key => $c) {
                    $c['parent_id'] = $md['id'];
                    MenuDetails::create($c);
                }
            }
        }

        // NOTE : rubah aja Kalo ada yang lebih simpel

    }
}
