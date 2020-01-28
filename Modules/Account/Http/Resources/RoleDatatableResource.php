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

            'id' => (int) $this->id,
            'slug' => (string) $this->slug,
            'name' => (string) $this->name,
            'data' => $this->resource,
        ];
    }

}
