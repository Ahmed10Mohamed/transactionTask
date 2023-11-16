<?php

namespace App\Models\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepository {

    public function all_transactions()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        return $transactions;
    }
    public function find_transaction($id){
        $transaction = transaction::findOrfail($id);
        return $transaction;
    }

    public function store($request)
    {
        $data = $request->except(['_token']);
       DB::beginTransaction();
       try {
                if($request->vat){
                    $data['amount_vat'] = $this->calc_amount_vat($request->amount,$request->vat);
                }
                transaction::create($data);
            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }

    public function destroy($id){
        $transaction = $this->find_transaction($id);
        DB::beginTransaction();
        try {

            $transaction->delete();
            $transaction->payments->delete();
             DB::commit();

         } catch (\Exception $e) {
             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }

    public function calc_amount_vat($total,$vat){
        $amount_vat = $total * $vat;
        $amount_vat = $amount_vat /100;
        $amount_vat = $total + $amount_vat;
        return $amount_vat;
    }

}
