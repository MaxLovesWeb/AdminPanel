<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Joshbrw\LaravelPermissions\PermissionGroup;

class PermissionResource extends JsonResource
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
            'key' => $this->resource->getKey(),
            'name' => $this->resource->getName(),
            'description' => $this->resource->getDescription(),
        ];


        //$this->resource->getPermissions();

    }

}
