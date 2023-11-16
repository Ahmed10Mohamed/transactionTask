<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'amount_vat',
        'user_id',
        'due_date',
        'vat',
        'is_vat',
        'status',
    ];
    public function payer_info()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
