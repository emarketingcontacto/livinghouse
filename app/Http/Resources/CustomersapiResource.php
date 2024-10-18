<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomersapiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    /*
    public function toArray(Request $request): array
    {
        return[
            'contactoId'    =>  $this->contactoId,
            'contactoName'  =>  $this->contactoName,
            'contactoPhone' =>  $this->contactoPhone,
            'contactoEmail' =>  $this->contactoEmail,
            'inmoId'        =>  $this->inmoId
        ];
    }
    */
}
