@extends('lasinkyay::layouts.master')

@section('content')
<div class="m-10">
	<h2 class="text-3xl font-medium leading-none mb-2">Edit Plan</h2>

	<form action="{{ route('lasinkyay.plans.update', ['plan' => $plan]) }}" method="POST" class="w-full">
		@method('PUT')
		@csrf
		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
				<label for="name">
					Name
				</label>
				<input class="mb-3 @if($errors->has('name')) error @endif" id="name" name="name" type="text" value="{{$plan->name}}" placeholder="plan name" required="">
				@if($errors->has('name'))
					<p class="text-error">{{$errors->first('name')}}</p>
				@endif
			</div>
			<div class="w-full md:w-1/2 px-3">
				<label for="price">
					Price
				</label>
				<input class="@if($errors->has('price')) error @endif" id="price" name="price" type="number" value="{{$plan->price}}" placeholder="10000" required="">
				@if($errors->has('price'))
					<p class="text-error">{{$errors->first('price')}}</p>
				@endif
			</div>
		</div>
		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full px-3">
				<label for="description">
					Description
				</label>
				<input class="@if($errors->has('description')) error @endif" id="description" name="description" type="text" value="{{$plan->description}}" placeholder="plan description" required="">
				@if($errors->has('description'))
					<p class="text-error">{{$errors->first('description')}}</p>
				@endif
			</div>
		</div>
		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label for="interval-count">
					Interval Count
				</label>
				<input class="@if($errors->has('interval_count')) error @endif" id="interval-count" name="interval_count" type="number" value="{{$plan->interval_count}}" placeholder="3" required="">
				@if($errors->has('interval_count'))
					<p class="text-error">{{$errors->first('interval_count')}}</p>
				@endif
			</div>
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label for="interval">
					Interval
				</label>
				<div class="relative">
					<select class="" id="interval" name="interval" required="">
						<option @if($plan->interval=='day') selected @endif>day</option>
						<option @if($plan->interval=='month') selected @endif>month</option>
					</select>
					<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
						<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
					</div>
				</div>
			</div>
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label for="sort-order">
					Sort Order
				</label>
				<input class="@if($errors->has('sort_order')) error @endif" id="sort-order" name="sort_order" type="number" value="{{$plan->sort_order}}" placeholder="1" required="">
				@if($errors->has('sort_order'))
					<p class="text-error">{{$errors->first('sort_order')}}</p>
				@endif
			</div>
		</div>
		<div class="flex flex-wrap -mx-3 mb-2">
			<div class="w-full px-3">
				<button class="" type="submit">
					Submit
				</button>
			</div>
		</div>
	</form>
</div>
@endsection
