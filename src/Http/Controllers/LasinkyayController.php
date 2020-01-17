<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers;

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
        $subscriptions = config('lasinkyay.models.plan_subscription')::findPending()->paginate(config('lasinkyay.items_per_page'));
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
        $user = config('lasinkyay.models.user')::findOrFail($request->user_id);
        $plan = config('lasinkyay.models.plan')::findOrFail($request->plan_id);
        $user->newSubscription('main', $plan)->create();

        return redirect()->route('lasinkyay.plans.show', ['plan' => $request->plan_id])->with('status', $user->email . ' has subscribed.');
    }

    public function approve(Request $request)
    {
        $sub = config('lasinkyay.models.plan_subscription')::findOrFail($request->sub_id);
        $sub->approve();

        return back()->with('status', $sub->subscribable->email . ' subscription is approved.');
    }
}
