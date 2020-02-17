<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class PermissionDatatableResource extends JsonResource
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
            'group' => new PermissionGroupResource($this->resource),
            'permissions' => PermissionResource::collection($this->resource->getPermissions()),
        ];
    }

}
