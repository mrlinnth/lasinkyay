@extends('lasinkyay::layouts.full-w')

@section('heading', 'Dashboard')

@section('content')

    <h3 class="text-2xl font-medium leading-none my-3">Pending Subscriptions</h3>

	@include('lasinkyay::partials.subs-table', ['subscriptions' => $subscriptions])

@endsection
