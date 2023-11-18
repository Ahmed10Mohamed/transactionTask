<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repositories\PaymentRepository;
use App\Validators\paymentValidators;
use Illuminate\Http\Request;

class paymentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    private PaymentRepository $paymentRepository;
    private paymentValidators $paymentValidator;
    public function __construct(PaymentRepository $paymentRepository,paymentValidators $paymentValidator){
        $this->paymentRepository = $paymentRepository;
        $this->paymentValidator = $paymentValidator;
    }

    public function payment_transaction($id)
    {
        $all_data = $this->paymentRepository->payments_transaction($id);
        $class = 'all_transaction';
        return view('admin.pages.transaction.payment.index',compact('all_data','class'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_payment($id)
    {
        $class = 'create_transaction';
        $data = $this->paymentRepository->payments_transaction($id);
        $residual = $data->amount_vat - $data->payments->sum('amount_paid');
        return view('admin.pages.transaction.payment.create',compact('class','data','residual'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function paymenr_store(Request $request)
    {
        $validator = $this->paymentValidator->validate($request);
        if ($validator) {
            return $validator;
        }

        $data = $this->paymentRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail',translate('Something is wrong! Try later'));
        }else{
            return redirect()->route('Transaction.Payment.show',['id'=>$request->transaction_id])->with('success',translate('Data created Success'));

        }
    }





}
