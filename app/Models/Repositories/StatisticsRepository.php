<?php

namespace App\Models\Repositories;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;


class StatisticsRepository
{

    public function Last_tranaction_month():array
    {
        $month = date('m');
        $date_search = [];

        for ($i=1; $i <=$month ; $i++) {

            $myDate =  date('Y-'.$i.'-d');
            $first_month = Carbon::createFromFormat('Y-m-d', $myDate)
            ->firstOfMonth()
            ->format('Y-m-d');
            $end_month = Carbon::createFromFormat('Y-m-d', $myDate)
            ->endOfMonth()
            ->format('Y-m-d');
            $date_search[]=array('first_month'=>$first_month,'end_month'=>$end_month);
        }
        return[
            'date_search'=>$date_search,
        ];
    }

    public function Last_tranaction_year():array
    {
            $payment_paid = [];
            $payment_outstanding = [];
            $payment_overdue = [];
            $myDate =  date('Y-m-d');
            $last_year = date('Y-m-d', strtotime($myDate .' -1 year'));

            $first_year = Carbon::createFromFormat('Y-m-d', $last_year)
            ->firstOfYear()
            ->format('Y-m-d');
            $end_year = Carbon::createFromFormat('Y-m-d', $last_year)
            ->endOfYear()
            ->format('Y-m-d');
            $paid = Transaction::where('status','paid')->whereBetween('due_date', array($first_year, $end_year))->pluck('id')->toArray();
            $payment_paid []= Payment::whereIn('transaction_id',$paid)->sum('amount_paid');
            $outstanding = Transaction::where('status','outstanding')->whereBetween('due_date', array($first_year, $end_year))->pluck('id')->toArray();
            $payment_outstanding[] = Payment::whereIn('transaction_id',$outstanding)->sum('amount_paid');
            $overdue = Transaction::where('status','overdue')->whereBetween('due_date', array($first_year, $end_year))->pluck('id')->toArray();
            $payment_overdue[] = Payment::whereIn('transaction_id',$overdue)->sum('amount_paid');

        return[
            'paid'=>$payment_paid,
            'outstanding'=>$payment_outstanding,
            'overdue'=>$payment_overdue,
        ];
    }

    public function tranaction_status(){
        $status = [];
        $status[] = 'paid';
        $status[] = 'outstanding';
        $status[] = 'overdue';
        return $status;
    }
    public function all_amount(){
        $ids = Transaction::pluck('id')->toArray();
        $amount_paid = Payment::whereIn('transaction_id',$ids)->sum('amount_paid');
        return $amount_paid;
    }
















}
