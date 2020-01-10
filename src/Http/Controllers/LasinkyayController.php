<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LasinkyayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lasinkyay::index');
    }

    /**
     * For test purpose
     */
    public function test()
    {
        return view('lasinkyay::test');
    }

    public function subscribe(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $plan = app('rinvex.subscriptions.plan')->find($request->plan_id);
        $user->newSubscription('main', $plan);

        return redirect()->route('lasinkyay.plans.show', ['plan' => $request->plan_id])->with('status', $user->email . ' has subscribed.');
    }
}
