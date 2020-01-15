    <table class="table table-full">
    	<tr>
    		<th>User</th>
    		<th>Bought</th>
            <th>Plan</th>
    		<th>Start</th>
    		<th>End</th>
    		<th>Status</th>
    		<th>Action</th>
    	</tr>
    	@foreach($subscriptions as $sub)
    		<tr>
    			<td>{{$sub->subscribable->name}} [#{{$sub->subscribable_id}}]</td>
    			<td>{{$sub->bought_at}}</td>
                <td>{{$sub->plan->name}}</td>
    			<td>{{$sub->starts_at}}</td>
    			<td>{{$sub->ends_at}}</td>
    			<td>{{$sub->status}}</td>
    			<td>
    				@if($sub->is_pending)
						<form action="{{ route('lasinkyay.approve') }}" method="POST" class="w-full">
							@csrf
							<input type="hidden" name="sub_id" value="{{$sub->id}}">
							<button class="" type="submit">
								Approve
							</button>
						</form>
    				@endif
    			</td>
    		</tr>
    	@endforeach
    </table>
