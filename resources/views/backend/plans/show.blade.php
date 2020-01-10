@extends('lasinkyay::layouts.master')

@section('content')
    <div class="m-10">
        <h2 class="text-3xl font-medium leading-none">Plan Details</h2>

		@include('lasinkyay::partials.alert')
		<div class="flex flex-wrap">
			<div class="w-full md:w-1/2 px-2">
		        <table class="table table-full">
		            <tr>
		                <td>Plan Name</td>
		                <td>{{$plan->name}}</td>
		            </tr>
		                <td>Fees</td>
		                <td>{{$plan->price}} {{$plan->currency}}</td>
		            </tr>
		                <td>Duration</td>
		                <td>{{$plan->invoice_period}} {{$plan->invoice_interval}}</td>
		            </tr>
		                <td>Description</td>
		                <td>{{$plan->description}}</td>
		            </tr>
		                <td>Action</td>
		                <td>
		                	<a href="" class="button mr-2">Edit</a> <a href="" class="button">Delete</a>
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

        <h2 class="text-3xl font-medium leading-none mt-2">Subscriptions</h2>

        <table class="table table-full">
        	<tr>
        		<th>User</th>
        		<th>Start</th>
        		<th>End</th>
        		<th>Cancel</th>
        	</tr>
        	@foreach($subscriptions as $sub)
        		<tr>
        			<td>{{$sub->user->email}}</td>
        			<td>{{$sub->starts_at}}</td>
        			<td>{{$sub->ends_at}}</td>
        			<td>{{$sub->cancels_at}}</td>
        		</tr>
        	@endforeach
        </table>
    </div>
@endsection
