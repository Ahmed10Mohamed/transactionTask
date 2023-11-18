<?php

namespace App\Models\Repositories;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PaymentRepository {

    public function payments_transaction($id)
    {
        $transaction = Transaction::with('payments','payer_info')->findOrFail($id);
        return $transaction;
    }
    public function store($request)
    {
        $data = $request->except(['_token']);
        $tranaction = $this->payments_transaction($request->transaction_id);
       DB::beginTransaction();
       try {

                 Payment::create($data);
                if($tranaction->amount_vat == $tranaction->payments->sum('amount_paid')){
                    $data_status['status'] = 'paid';
                    $tranaction->update($data_status);
                 }

            DB::commit();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
           return 'error';
        }


    }




}
