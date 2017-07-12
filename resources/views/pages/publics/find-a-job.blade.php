@extends( 'layouts.public' )
@section( 'content' )

	<div class="page-content">
		
	</div> {{-- end of .page-content --}}

	{{-- modals --}}
	@include( 'includes.modals.signup' )
	@include( 'includes.modals.login' )

@stop