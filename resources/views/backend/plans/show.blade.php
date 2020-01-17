@extends('lasinkyay::layouts.full-w')

@section('heading', 'Plan Details')

@section('content')

	@include('lasinkyay::partials.alert')

	<div class="flex flex-wrap">
		<div class="w-full md:w-1/2 px-2">
	        <table class="table table-full">
	            <tr>
	                <td>Plan Name</td>
	                <td>{{$plan->name}}</td>
	            </tr>
	                <td>Fees</td>
	                <td>{{$plan->price}}</td>
	            </tr>
	                <td>Duration</td>
	                <td>{{$plan->interval_count}} {{$plan->interval}}</td>
	            </tr>
	                <td>Description</td>
	                <td>{{$plan->description}}</td>
	            </tr>
	                <td>Action</td>
	                <td>
	                	{{-- TO DO --}}
	                	<a href="{{route('lasinkyay.plans.edit', ['plan'=>$plan->id])}}" class="button mr-2">Edit</a>
	                	<a href="" class="button">Delete</a>
	                </td>
	            </tr>
	        </table>
		</div>
		<div class="w-full md:w-1/2 px-2">
			<form action="{{ route('lasinkyay.subscribe') }}" method="POST" class="w-full">
				@csrf
				<input type="hidden" name="plan_id" value="{{$plan->id}}">
				<label for="user-id">
					Manually subscribe a user
				</label>
				<div class="relative my-2 w-1/2">
					<select class="" id="user-id" name="user_id" required="">
						@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->email}}</option>
						@endforeach
					</select>
					<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
						<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
					</div>
				</div>
				<div class="my-2">
					<button class="" type="submit">
						Subscribe
					</button>
				</div>
			</form>
		</div>
	</div>

	<hr class="my-5">

    <h3 class="text-2xl font-medium leading-none my-5">Subscriptions for this package</h3>

	@include('lasinkyay::partials.subs-table', ['subscriptions' => $subscriptions])

@endsection
