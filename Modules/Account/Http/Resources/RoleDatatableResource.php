<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class RoleDatatableResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'role' => $this->resource,
            'permissions' => $this->getPermissions(),
            'users' => $this->getUsers(),

        ];
    }


    protected function getPermissions()
    {
        $permissions = $this->whenLoaded('permissions', function () {
            return $this->resource->permissions;
        }, new Collection());

        return $permissions;
    }

    protected function getUsers()
    {
        $permissions = $this->whenLoaded('users', function () {
            return $this->resource->users;
        }, new Collection());

        return $permissions;
    }

}
