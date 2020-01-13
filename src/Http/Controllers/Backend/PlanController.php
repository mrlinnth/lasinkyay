<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Mrlinnth\Lasinkyay\Models\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lasinkyay::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('lasinkyay::backend.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'invoice_period' => 'required',
        ]);

        $plan = Plan::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'interval' => $request->interval,
            'interval_count' => $request->interval_count,
            'trial_period_days' => 0,
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('lasinkyay.plans.index')->with('status', 'New PFC plan created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        $subscriptions = $plan->subscriptions;
        // dd($subscriptions->first()->subscribable->name);
        // dd($subscriptions);
        $users = User::all();
        return view('lasinkyay::backend.plans.show', ['plan' => $plan, 'subscriptions' => $subscriptions, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('lasinkyay::backend.plans.edit')->with('plan', $plan);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $plan = app('rinvex.subscriptions.plan')->find($id);
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->price = $request->price;
        $plan->invoice_period = $request->invoice_period;
        $plan->invoice_interval = $request->invoice_interval;
        $plan->sort_order = $request->sort_order;
        $plan->save();

        return redirect()->route('lasinkyay.plans.index')->with('status', $plan->name . ' is updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
