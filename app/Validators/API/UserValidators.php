<?php

namespace App\Validators\API;

use Illuminate\Support\Facades\Validator;
class UserValidators
{
    public function register($request){
            $Validator=Validator::make($request->all(),[
                'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL|digits:11',
                'password'   => 'required|min:6|confirmed',
                'name'=>'required',
           ],
           $messages = [
             'phone.required' =>translate('Please Enter Your phone'),
             'phone.unique' =>translate('This Phone Already Used Before'),
             'phone.numeric' =>translate('phone should to be number'),
             'phone.digits' =>translate('phone should to be 11 Number'),
             'password.required' =>translate('Please Enter Your password'),
             'password.min' =>translate('Password Must Be At Least 6 Characters'),
             'password.confirmed' =>translate('Password & Its Confirmation Not Matching'),
             'name.required' =>translate('Please Enter Your Name'),

           ]);

            //  staret

            if ($Validator->fails())
            {
                return response()->json(['success' => false,  'message'=>$Validator->errors()->first(), "code"=>401],401);
            }

    }


    public function login($request){
        $Validator=Validator::make($request->all(),[
            'phone'       => 'required',
            'password'     => 'required',
        ],
        $messages = [
            'phone.required' =>translate('Please Enter Your phone'),
            'password.required' =>translate('Please Enter Your password'),

        ]);
        if ($Validator->fails())
        {
            return response()->json(['success' => false,  'message'=>$Validator->errors()->first(), "code"=>401],401);
         }

    }


    public function update_profile($request){
        $user = api();
        $Validator=Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required|unique:users,phone,'.$user->id.',id,deleted_at,NULL|digits:11',
        ],
            $messages = [
                'name.required' =>translate('Please Enter Your full name'),
                'phone.required' =>translate('Please Enter Your phone'),
                'phone.unique' =>translate('This Phone Already Used Before'),
                'phone.numeric' =>translate('phone should to be number'),
                'phone.digits' =>translate('phone should to be 12 char'),

            ]);

            if ($Validator->fails())
            {
                return response()->json(['success' => false,  'message'=>$Validator->errors()->first(), "code"=>200],200);
            }


    }

}
