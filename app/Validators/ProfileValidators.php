<?php

namespace App\Validators;
use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProfileValidators
{
      public function validate(Request $request)
    {
        // dd(Request()->all());

       $validatedData = $request->validate([
           'name' => 'required',
            'user_name' => 'required|unique:users,user_name,'.user()->id.',id,deleted_at,NULL',
            'email' => 'required|email|unique:users,email,'.user()->id.',id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,'.user()->id.',id,deleted_at,NULL',
            'image' => 'mimes:jpeg,png,jpg,gif,svg,gif,webp',

        ],
        $messages = [
            'name.required' => translate('Please Enter Your Name'),
            'user_name.required' => translate('Please Enter Your User Name'),
            'user_name.unique' => translate('This User Name Already Used Before'),
            'email.required' => translate('Please Enter Your E-mail'),
            'email.unique' => translate('This E-mail Already Used Before'),
            'image.mimes' => translate('This File Image Not Support'),

        ]);
    }
    public function update_password(Request $request){
           $validatedData = $request->validate([
            'current_password'=>'required',
            'password' => 'required|min:6|confirmed',

        ],
        $messages = [
            'current_password.required'=>translate('Please Enter Current Password'),
            'password.required'=>translate('Please Enter Password'),
            'password.min'=>translate('Password Must Be At Least 6 Charachters'),
            'password.confirmed'=>translate('Password & Its Confirmation Not Matching'),

        ]);
    }
}
