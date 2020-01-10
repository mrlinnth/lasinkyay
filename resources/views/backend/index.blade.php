@extends('lasinkyay::layouts.master')

@section('content')
    <div class="m-10">
        <h2 class="text-3xl font-medium leading-none mb-2">Plans</h2>
        <a href="{{ route('lasinkyay.plans.create') }}" class="text-sm text-blue-300 font-light">New Plan</a>

		@include('lasinkyay::partials.alert')
        <lsk-plans-table></lsk-plans-table>
    </div>
@endsection
