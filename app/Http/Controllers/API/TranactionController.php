<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserTranactionResource;
use App\Models\Repositories\API\UserTranactionRepository;
use Illuminate\Http\Request;

class TranactionController extends Controller
{
    private UserTranactionRepository $tranactionRepository;
    public function __construct(UserTranactionRepository $tranactionRepository){
        $this->tranactionRepository = $tranactionRepository;
    }
    public function my_tranaction(Request $request){
        $data = UserTranactionResource::collection($this->tranactionRepository->user_tranactions($request->user_id));
        return response()->json(['success'=>true,'data'=>$data,'code'=>200]);
    }
}
