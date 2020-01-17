<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

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
            'interval_count' => 'required',
        ]);

        $plan = config('lasinkyay.models.plan')::create([
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
        $plan = config('lasinkyay.models.plan')::find($id);
        $subscriptions = $plan->subscriptions()->paginate(config('lasinkyay.items_per_page'));
        // dd($subscriptions->first()->subscribable->name);
        // dd($subscriptions);
        $users = config('lasinkyay.models.user')::all();
        return view('lasinkyay::backend.plans.show', ['plan' => $plan, 'subscriptions' => $subscriptions, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $plan = config('lasinkyay.models.plan')::find($id);
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
        $plan = config('lasinkyay.models.plan')::find($id);
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->price = $request->price;
        $plan->interval = $request->interval;
        $plan->interval_count = $request->interval_count;
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
