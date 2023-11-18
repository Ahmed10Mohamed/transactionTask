<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return[
            'id'=>$this->id,
            'full_name'=>$this->name,
            'phone'=>$this->phone,
            'access_token'=>$this->access_token,

        ];
    }
}
