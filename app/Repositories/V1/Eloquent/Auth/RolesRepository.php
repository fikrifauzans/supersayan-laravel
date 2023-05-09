<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Roles;
use App\Repositories\V1\Eloquent\BaseRepository;


class RolesRepository extends BaseRepository
{
    protected $model;

    public function __construct(Roles $model)
    {
        $this->model = $model;
    }

    public function updateChild($id, $request)
    {
        if ($request != null) {

            $permissionsIds = array_column($request, 'id');
            $PermissionAccess = $this->model->findOrFail($id)->PermissionAccess;
            ($PermissionAccess->whereNotIn('permission_id', $permissionsIds))
                ->each(function ($data) {
                    return $data->forceDelete();
                });
            $oldPermissionsIds = array_column($PermissionAccess->toArray(), 'id');
            $diffIds = array_diff($permissionsIds, $oldPermissionsIds);
            foreach ($diffIds as $key => $value) {
                $this->model->PermissionAccess()
                    ->insert(
                        ['role_id' => $id, 'permission_id' => $value]
                    );
            }
        }
    }
}
