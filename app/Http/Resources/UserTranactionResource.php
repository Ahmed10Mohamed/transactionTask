<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTranactionResource extends JsonResource
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
            'amount'=>number_format($this->amount,2),
            'amount_vat'=>number_format($this->amount_vat,2),
            'amount_paid'=> $this->payments->sum('amount_paid'),
            'Residual'=>Residual_transaction($this->amount_vat , $this->payments->sum('amount_paid')),
            'is_vat'=>(bool)$this->is_vat,
            'vat'=>$this->vat,
            'due_date'=>date('Y-m-d', strtotime($this->due_date)),
            'status'=>$this->status,
            'payments'=> PaymentResource::collection($this->payments)

        ];
    }
}
