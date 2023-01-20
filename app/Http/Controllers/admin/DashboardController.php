<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\User;
use App\Traits\DatatableTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    use DatatableTrait;

    //
    public function __construct()
    {
        $this->middleware(['permission:view dashboard'])->only(['index']);
    }

    public function index()
    {

        Carbon::setLocale('en');

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
        foreach ($weeks as $key) {

            $se = getDateWeekSE($key);


            $orders = OrderDetail::whereBetween('created_at', [Carbon::parse($se['s']), Carbon::parse($se['e'])])->get();
            $se['s'] = Carbon::parse($se['s'])->format('l d');
            $se['e'] = Carbon::parse($se['e'])->format('d');

            $weeksD[$index] = $se;
            $amount = 0;

            foreach ($orders as $order)
                $amount = $amount + $order->total;
            $weeksD[$index]['amount'] = $amount;
            $weeksD[$index]['count'] = $orders->count();
            $index++;
        }

        $months = getAllMonths();
        $monthsD = [];
        $index = 0;

        foreach ($months as $month) {
            $se = getDateYearSE($month);
            $orders = OrderDetail::whereBetween('created_at', [Carbon::parse($se['s']), Carbon::parse($se['e'])])->get();
            $monthsD[$index]['month'] = $month;
            $amount = 0;

            foreach ($orders as $order)
                $amount = $amount + $order->total;

            $monthsD[$index]['amount'] = $amount;
            $monthsD[$index]['count'] = $orders->count();
            $index++;
        }

        $today = Carbon::now();
        $yesterday = Carbon::parse(date('d.m.Y', strtotime("-1 days")));

        $Norders = OrderDetail::whereBetween('created_at', [
            $yesterday, $today
        ])->get();
        $amount = 0;

        foreach ($Norders as $order)
            $amount = $amount + $order->total;

        $Nusers = User::whereBetween('created_at', [
            $yesterday, $today
        ])->where('is_admin', false)->get();


        $Ndata['ordersCount'] = $Norders->count();
        $Ndata['usersCount'] = $Nusers->count();
        $Ndata['amount'] = $amount;

        return Inertia::render('Dashboard', [
            'weeksD' => $weeksD,
            'monthsD' => $monthsD,
            'Ndata' => $Ndata
        ])->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders());

    }


    public function getUrl()
    {
        return route('admin.dashboard.orders');
    }

    public function datatables(Request $request)
    {
        $today = Carbon::now();
        $yesterday = Carbon::parse(date('d.m.Y', strtotime("-1 days")));

        $builder = OrderDetail::query()->whereBetween('created_at',[
            $yesterday,$today
        ])->orderBy('created_at', 'desc');

        $builder = datatables()->of($builder);

        $datatables = $builder
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('user_name', fn($model) => $model->userAddress->user->name)
            ->addColumn('email', fn($model) => $model->userAddress->user->email)
            ->addColumn('count', fn($model) => $model->products->count())
            ->addColumn('total', fn($model) => $model->total)
            ->addColumn('status', fn($model) => $model->current_status)
            ->addColumn('created_at', fn($model) => translateDate($model->created_at))
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'Id'],
            ['data' => 'user_name', 'name' => 'User Name'],
            ['data' => 'email', 'name' => 'Email', 'searchable' => true],
            ['data' => 'count', 'name' => 'Products Count', 'searchable' => false],
            ['data' => 'total', 'name' => 'total', 'searchable' => false],
            ['data' => 'status', 'name' => 'Status', 'searchable' => false],
            ['data' => 'created_at', 'name' => 'Created at', 'searchable' => false],
      ];
    }

    public function getHeaders()
    {
        return [
            'ID',
            'User Name',
            'Email',
            'Products Count',
            'Total',
            'Status',
            'Created at'
        ];
    }

}
