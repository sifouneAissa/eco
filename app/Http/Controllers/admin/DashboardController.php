<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:view dashboard'])->only(['index']);
    }

    public function index(){

        $weeks = [
            'first',
            'second',
            'third',
            'fourth'
        ];
        $weeksD = [];
        $index = 0;
        $max = 0;
        // per weeks
        foreach($weeks as $key){

            $se = getDateWeekSE($key);


            $orders = OrderDetail::whereBetween('created_at', [Carbon::parse($se['s']), Carbon::parse($se['e'])])->get();
            $se['s'] = Carbon::parse($se['s'])->format('l d');
            $se['e'] = Carbon::parse($se['e'])->format('d');

            $weeksD[$index] = $se;
            $amount = 0;

            foreach($orders as $order)
                    $amount = $amount + $order->total;
            $weeksD[$index]['amount'] = $amount;
            $weeksD[$index]['count'] = $orders->count();
            $index++;
        }

        $months = getAllMonths();
        $monthsD = [];
        $index = 0;

        foreach($months as $month){
            $se = getDateYearSE($month);
            $orders = OrderDetail::whereBetween('created_at', [Carbon::parse($se['s']), Carbon::parse($se['e'])])->get();
            $monthsD[$index]['month'] = $month;
            $amount = 0;

            foreach($orders as $order)
                $amount = $amount + $order->total;

            $monthsD[$index]['amount'] = $amount;
            $monthsD[$index]['count'] = $orders->count();
            $index++;
        }

        return Inertia::render('Dashboard',[
            'weeksD' => $weeksD,
            'monthsD' => $monthsD
        ]);
    }

}
