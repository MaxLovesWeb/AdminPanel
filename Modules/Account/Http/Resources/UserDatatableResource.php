<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class UserDatatableResource extends JsonResource
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
            'user' => $this->resource,
            'roles' => $this->getRoles(),
            'permissions' => $this->getPermissions(),
        ];
    }

    protected function getRoles()
    {
        $roles = $this->whenLoaded('roles', function () {
            return $this->resource->roles;
        }, new Collection());

        return $roles;
    }

    protected function getPermissions()
    {
        $permissions = $this->whenLoaded('permissions', function () {
            return $this->resource->permissions;
        }, new Collection());

        return $permissions;
    }

}
