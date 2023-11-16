<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Repositories\StatisticsRepository;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private StatisticsRepository $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository){
        $this->statisticsRepository = $statisticsRepository;

    }
    public function index(Request $request)
    {
            $class = "dashboard";
           $last_year = $this->statisticsRepository->competed('year');
           $last_month = $this->statisticsRepository->competed('month');
           $last_week = $this->statisticsRepository->competed('week');
           $last_document_month = $this->statisticsRepository->Last_document_month();
           $task = $request->task;


        return view('admin.home',compact('last_document_month','task','class','last_year','last_month','last_week'));
    }

    public function custom_logout(){
        $gurad = Auth::guard('web');
        $gurad->logout();
        return redirect('login')->with('success',translate('logout success'));

    }




}
