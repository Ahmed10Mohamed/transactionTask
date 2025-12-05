<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Http\Resources\ClientResource;
use App\Models\Repositories\API\UserRepository;
use PhpParser\Node\Expr\FuncCall;
use App\Validators\API\UserValidators;

class AuthController extends Controller
{
    private UserRepository $userRepository;
    private UserValidators $userValidators;
    public function __construct(UserRepository $userRepository,UserValidators $userValidators){
        $this->userRepository = $userRepository;
        $this->userValidators = $userValidators;
    }


    public function register (Request $request)
    {
        $validator = $this->userValidators->register($request);
        if ($validator) {
            return $validator;
        }

        $data = $this->userRepository->register($request);
        if($data === 'error'){
            return response()->json([
                'success' => false,
                'message' => translate('Something went wrong! Try later'),
                'code' => 200
            ]);
        }else{
            return response()->json([
                'success' => true,
                'data' => $data, // ممكن يحتوي أو لا يحتوي على حقول معينة
                'code' => 200
            ]);
        }

        
    }
    public function login(Request $request)
    {
        $validator = $this->userValidators->login($request);
        if ($validator) {
            return $validator;
        }
        $data = $this->userRepository->login($request);

        if($data === 'error') {
            return response()->json(['success' => false,'message' => translate('Something went wrong! Try later'),'code' => 200]);
        }elseif($data == 'not_found')
        {
            return response()->json(['success' => false,'message' => translate('this phone not correct'),'code' => 200]);
        }elseif($data == 'this_password_not_correct')
        {
            return response()->json(['success' => false,'message' => translate('this password not correct'),'code' => 200]);
        }
        else{

            return response()->json(['success'=>true,'data'=>$data,'message'=>translate('Login Successfully'),'code'=>200]);
        }
    }



    public function profile(){

        $data = new ClientResource($this->userRepository->find_client(api()->id));
        return response()->json(['success' => true, 'data'=>$data,  'code'=>200]);
    }
    public function update_profile(Request $request){

        $validator = $this->userValidators->update_profile($request);
        if ($validator) {
            return $validator;
        }


        $data = $this->userRepository->update_profile($request);

        if($data === 'error') {
            return response()->json(['success' => false,'message' => translate('Something went wrong! Try later'),'code' => 200]);

        }else{
            return response()->json(['success' => true, 'message'=>translate('Account Updated Successfully'),'code'=>200]);
        }

    }




}
