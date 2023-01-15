<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Jenssegers\Agent\Agent;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Http\Controllers\Inertia\Concerns\ConfirmsTwoFactorAuthentication;

class UserAccountController extends Controller
{
    use ConfirmsTwoFactorAuthentication;

    public function index(Request $request){

        $this->validateTwoFactorAuthenticationState($request);
        $orders_count = $request->count ? $request->count : 3;
        $auth = auth()->user();
        $paymentMethods = [];
        try{
            $paymentMethods = $auth->paymentMethods();
        }
        catch(\Exception $e){}
        // addresses of the user
        $addresses = UserAddress::where("user_id",$auth->id)->get();
        // get only paid orders
        $orders = OrderDetail::where("user_id",$auth->id)->whereHas('paymentDetail',function ($builder) {
//                $builder->where('status','paid');
        })->with(['paymentDetail','products','orderTracks','userAddress'])->orderBy('created_at','desc')->get()->take($orders_count)->toArray();

        return Inertia::render('Account',[
            'addresses' => $addresses,
            'orders' => $orders,
            'paymentMethods' => $paymentMethods,
            'confirmsTwoFactorAuthentication' => Features::optionEnabled(Features::twoFactorAuthentication(), 'confirm'),
            'sessions' => $this->sessions($request)->all(),
        ]);
    }



    /**
     * Get the current sessions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function sessions(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                ->where('user_id', $request->user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) use ($request) {
            $agent = $this->createAgent($session);

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }


    /**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return \Jenssegers\Agent\Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
