<?php

namespace App\Validators;
use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class paymentValidators
{

    public function validate(Request $request)
    {
        // dd(Request()->all());

        $validatedData = $request->validate([
            'amount_paid'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            $messages = [
                'amount_paid.required'=>translate('Please Enter amount'),
                'amount_paid.regex'=>translate('amount Must Be NUmber'),
            ]

    );
    }





}
