@extends('lasinkyay::layouts.full-w')

@section('heading', 'Plans')

@section('content')

    @include('lasinkyay::partials.alert')

    <lsk-plans-table></lsk-plans-table>

@endsection
