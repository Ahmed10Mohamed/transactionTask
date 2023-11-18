<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'=>$this->id,
            'amount_paid'=>number_format($this->amount_paid,2),
            'details'=>$this->details,
            'created_at'=>date('Y-m-d', strtotime($this->created_at))

        ];
    }
}
