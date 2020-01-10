<?php

namespace Mrlinnth\Lasinkyay\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $one_month = app('rinvex.subscriptions.plan')->where('invoice_period', 1)->where('invoice_interval', 'month')->first();
        $three_months = app('rinvex.subscriptions.plan')->where('invoice_period', 3)->where('invoice_interval', 'month')->first();
        $six_months = app('rinvex.subscriptions.plan')->where('invoice_period', 6)->where('invoice_interval', 'month')->first();
        $nine_months = app('rinvex.subscriptions.plan')->where('invoice_period', 9)->where('invoice_interval', 'month')->first();
        return view('lasinkyay::frontend.index', compact('one_month', 'three_months', 'six_months', 'nine_months'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('lasinkyay::create');
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
        return view('lasinkyay::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('lasinkyay::edit');
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
