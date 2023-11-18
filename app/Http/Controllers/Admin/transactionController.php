<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repositories\TransactionRepository;
use App\Validators\transactionValidators;
use Illuminate\Http\Request;

class transactionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    private TransactionRepository $transactionRepository;
    private transactionValidators $transactionValidator;
    public function __construct(TransactionRepository $transactionRepository,transactionValidators $transactionValidator){
        $this->transactionRepository = $transactionRepository;
        $this->transactionValidator = $transactionValidator;
    }

    public function index(Request $request)
    {
        $all_data = $this->transactionRepository->search_transactions($request);
        $class = 'all_transaction';
        return view('admin.pages.transaction.index',compact('all_data','class'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = 'create_transaction';
        $users = $this->transactionRepository->users();
        return view('admin.pages.transaction.create',compact('class','users'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->transactionValidator->validate($request);
        if ($validator) {
            return $validator;
        }

        $data = $this->transactionRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail',translate('Something is wrong! Try later'));
        }else{
            return redirect()->route('Transaction.Transaction.index')->with('success',translate('Data created Success'));

        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->transactionRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail',translate('Something is wrong! Try later'));
        }else{
            return redirect()->back()->with('success',translate('Data Deleted Success'));

        }
    }
}
