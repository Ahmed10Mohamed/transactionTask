<?php

namespace App\Models\Repositories;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentRepository {

    public function payments_transaction($id)
    {
        $transaction = Transaction::with('payments','payer_info')->findOrFail($id);
        return $transaction;
    }
    public function store($request)
    {
        $data = $request->except(['_token']);
       DB::beginTransaction();
       try {

                 Payment::create($data);
                 DB::commit();
                 $this->update_status($request->transaction_id);

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
           return 'error';
        }
    }
    public function update_status($id){

         DB::beginTransaction();
         try {
            $tranaction = $this->payments_transaction($id);
            if($tranaction->amount_vat == $tranaction->payments->sum('amount_paid')){
                $data_status['status'] = 'paid';
                $tranaction->update($data_status);
             }
             Log::info('amount paid:- '.$tranaction->payments->sum('amount_paid'));
             Log::info('amount_vat:- '.$tranaction->amount_vat);

              DB::commit();

          } catch (\Exception $e) {
              // dd($e);
              DB::rollback();
             return 'error';
          }

    }




}
