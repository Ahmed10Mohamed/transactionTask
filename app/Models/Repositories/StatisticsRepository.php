<?php

namespace App\Models\Repositories;
use App\Models\Admin;
use App\Models\LicenseBox;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SendSignature;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TypeResived;
use App\Models\User;
use DateTime;


class StatisticsRepository
{


    public function competed($by):array
    {
        $today = new DateTime();
        $year  = (int) $today->format('Y');
        $week  = (int) $today->format('W'); // Week of the year
        $month  = (int) $today->format('m'); // Week of the year
        $day   = (int) $today->format('w'); // Day of the week (0 = sunday)
        $sameDayLastYear = new DateTime();
        if($by  === 'year'){
            $sameDayLastYear->setISODate($year - 1, $week, $day);
        }elseif($by === 'week'){
            $sameDayLastYear->setISODate($year, $week - 1, $day);
        }elseif($by === 'month'){
            $sameDayLastYear->setDate($year, $month - 1, $day);
        }
        $now = 10;
        $progress  = 20;
        $Completed  = 30;
        $total = $now + $Completed + $progress;
        if($total == 0){
            $res = 0;
        }else{
            $res = $Completed / $total;
            $res = $res * 100;
        }

        return array(number_format($res,2),number_format($Completed,2));
    }
    public function Last_document_month():array
    {
        $today = new DateTime();
        $year  = (int) $today->format('Y');
        $week  = (int) $today->format('W'); // Week of the year
        $month  = (int) $today->format('m'); // Week of the year
        $day   = (int) $today->format('w'); // Day of the week (0 = sunday)
        $sameDayLastYear = new DateTime();

            $sameDayLastYear->setDate($year, $month - 1, $day);

            $now = 45;
            $progress  = 20;
            $Completed  = 30;
            // Now
        $total = $now + $Completed + $progress;
        if($total == 0){
            $res_now = 0;
        }else{
            $res_now = $now / $total;
            $res_now = $res_now * 100;
        }
         // progress
         $total = $now + $Completed + $progress;
         if($total == 0){
             $res_progress = 0;
         }else{
             $res_progress = $progress / $total;
             $res_progress = $res_progress * 100;
         }
          // complated
        $total = $now + $Completed + $progress;
        if($total == 0){
            $res = 0;
        }else{
            $res = $Completed / $total;
            $res = $res * 100;
        }
        return[
            number_format($res_now,2),
            number_format($now,2),
            number_format($res_progress,2),
            number_format($progress,2),
            number_format($res,2),
            number_format($Completed,2),
        ];
    }















}
