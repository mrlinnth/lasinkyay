<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Mrlinnth\Lasinkyay\Transformers\Plan as PlanResource;
use Mrlinnth\Lasinkyay\Transformers\PlanCollection;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $plans = app('rinvex.subscriptions.plan')->get();
        return new PlanCollection($plans);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $plan = app('rinvex.subscriptions.plan')->find($id);
        return new PlanResource($plan);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
