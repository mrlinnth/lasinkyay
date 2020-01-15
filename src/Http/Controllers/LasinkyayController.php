<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Mrlinnth\Lasinkyay\Models\Plan;
use Mrlinnth\Lasinkyay\Models\PlanSubscription;
use Mrlinnth\Lasinkyay\Models\User;

class LasinkyayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subscriptions = PlanSubscription::findPending()->get();
        return view('lasinkyay::index', ['subscriptions' => $subscriptions]);
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
        $plan = Plan::findOrFail($request->plan_id);
        $user->newSubscription('main', $plan)->create();

        return redirect()->route('lasinkyay.plans.show', ['plan' => $request->plan_id])->with('status', $user->email . ' has subscribed.');
    }

    public function approve(Request $request)
    {
        $sub = PlanSubscription::findOrFail($request->sub_id);
        $sub->approve();

        return redirect()->route('lasinkyay.plans.show', ['plan' => $sub->plan_id])->with('status', $sub->subscribable->email . ' subscription is approved.');
    }
}
