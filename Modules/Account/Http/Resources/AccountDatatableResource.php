<?php

namespace Modules\Account\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class AccountDatatableResource extends JsonResource
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
            'first_name' => (string) $this->first_name,
            'last_name' => (string) $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'gender' => (string) $this->gender,
            'title' => (string) $this->title,
            'birthDate' => $this->birthDate,
            'birthPlace'=> $this->birthPlace,
            'faxNumber' => $this->faxNumber,
            'jobTitle'=> $this->jobTitle,
            'biography'=> $this->biography,
            'nationality' => $this->nationality,
            
            'user' => $this->getUser(),
            'roles' => $this->getRoles(),
            'account' => $this->resource,
        ];
    }

    // Relations

    protected function getUser()
    {
        $user = $this->whenLoaded('user', function () {
            return $this->resource->user;
        });

        return $user;
    }

    protected function getRoles()
    {
        $roles = $this->whenLoaded('roles', function () {
            return $this->resource->roles;
        }, new Collection());

        return $roles;
    }

}
