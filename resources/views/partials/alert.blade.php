@if(session('status'))
	@component('lasinkyay::components.alert-success')
		{{ session('status') }}
	@endcomponent
@endif
