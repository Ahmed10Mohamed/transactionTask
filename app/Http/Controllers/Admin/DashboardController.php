<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Repositories\StatisticsRepository;
use App\Models\Repositories\TransactionRepository;
class DashboardController extends Controller
{
    private StatisticsRepository $statisticsRepository;
    private TransactionRepository $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository,StatisticsRepository $statisticsRepository){
        $this->statisticsRepository = $statisticsRepository;
        $this->transactionRepository = $transactionRepository;

    }
    public function index(Request $request)
    {
            $class = "dashboard";
           $last_tranaction_month = $this->statisticsRepository->Last_tranaction_month();
           $Last_tranaction_year = $this->statisticsRepository->Last_tranaction_year();
           $all_amount = $this->statisticsRepository->all_amount();
           $tranaction_status = $this->statisticsRepository->tranaction_status();
           $month = date('m');
           $tranactions = $this->transactionRepository->latest_transactions();
        return view('admin.home',compact('Last_tranaction_year','tranaction_status','month','all_amount','last_tranaction_month','tranactions','class'));
    }

    public function custom_logout(){
        $gurad = Auth::guard('web');
        $gurad->logout();
        return redirect('login')->with('success',translate('logout success'));

    }




}
