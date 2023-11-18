<?php

namespace App\Validators;
use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class transactionValidators
{

    public function validate(Request $request)
    {
        // dd(Request()->all());

       $validatedData = $request->validate([
        'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        'due_date'=>'required|date_format:Y-m-d',
        'user_id'=>'required|exists:users,id',
        'vat' => 'required_if:is_vat,==, 1',
        ],
        $messages = [
            'amount.required'=>translate('Please Enter amount'),
            'amount.regex'=>translate('amount Must Be NUmber'),
            'due_date.required'=>translate('Please Enter Due date'),
            'due_date.date_format'=>translate('Due date Must Be Data ex:Y-m-d'),
            'user_id.required'=>translate('Please Select Payer'),
            'user_id.exists'=>translate('This Payer Not FOund'),
            'vat.required_if'=>translate('Please Enter Vat'),
            'vat.numeric'=>translate('Vat Must Be Number'),
            'vat.min'=>translate('Vat Min 1'),
        ]

    );
    }





}
