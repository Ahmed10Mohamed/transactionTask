<?php

namespace App\Jobs;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class updateTransactionStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tranactions  = Transaction::where('status','!=','paid')->with('payments')->orderBy('id', 'DESC')->get();
       
        if(count($tranactions) > 0){

            foreach($tranactions as $tranaction){
                if($tranaction->amount_vat == $tranaction->payments->sum('amount_paid')){
                    $data['status'] = 'paid';
                }elseif($tranaction->due_date > date('Y-m-d') && $tranaction->amount_vat !==$tranaction->payments->sum('amount_paid')){
                    $data['status'] = 'outstanding';
                }elseif($tranaction->due_date <= date('Y-m-d') && $tranaction->amount_vat !==$tranaction->payments->sum('amount_paid')){
                    $data['status'] = 'overdue';
                }
                $tranaction->update($data);
                Log::info('update states TransactionID Is '.$tranaction->id.' To '.$tranaction->status);
            }
        }else{
            Log::info('No Transactions Status Updated');
        }
    }
}
