@extends('lasinkyay::layouts.master')

@section('content')
    <h1 class="text-4xl">Hello World</h1>

    <p>
        This view is loaded from module: {!! config('lasinkyay.name') !!}
    </p>
@endsection
