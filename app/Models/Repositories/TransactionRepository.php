<?php

namespace App\Models\Repositories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TransactionRepository {

    public function users(){
        $users = User::where('user_type','customer')->orderBy('id', 'DESC')->get();
        return $users;
    }
    public function latest_transactions()
    {
        $transactions = Transaction::with('payments','payer_info')->orderBy('id', 'DESC')->take(5)->get();
        return $transactions;
    }

    public function search_transactions($request)
    {
        $transactions = Transaction::query();
        if($request->from_date != '' && $request->to_date != '')
        {
            $transactions = $transactions->whereBetween('due_date', array($request->from_date, $request->to_date));
        }
        $transactions = $transactions->with('payments','payer_info')->orderBy('id', 'DESC')->get();
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
                }else{
                    $data['amount_vat'] = $request->amount;
                }
                if($request->due_date > date('Y-m-d')){
                    $data['status'] ='outstanding';
                }else{
                    $data['status'] ='overdue';
                }
                transaction::create($data);
            DB::commit();

        } catch (\Exception $e) {
            //   dd($e);
            DB::rollback();
           return 'error';
        }


    }

    public function destroy($id){
        $transaction = $this->find_transaction($id);
        DB::beginTransaction();
        try {

            $transaction->payments->each->delete();
            $transaction->delete();
             DB::commit();

         } catch (\Exception $e) {
            //   dd($e);
             DB::rollback();
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
