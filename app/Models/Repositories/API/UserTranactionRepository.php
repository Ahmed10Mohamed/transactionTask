<?php

namespace App\Models\Repositories\API;

use App\Http\Resources\ClientResource;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTranactionRepository
{
    public function user_tranactions($user_id){
        $tranactions = Transaction::where('user_id',$user_id)->with('payments')->orderBy('id', 'DESC')->get();
        return $tranactions;
    }


}

