@extends( 'layouts.dashboard' )
@section( 'content' )

	<div class="content-details">
		<div class="row">
			<div class="col-md-6 col-xs-12 has-padR">
				<div class="box job-alerts">
					<div class="box-header row middle-xs between-xs">
						<div class="box-title row middle-xs">
							<div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
							<div class="text text-xs-uppercase">Job Alerts</div>
						</div>
						<div class="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>
					</div>
					<div class="box-content"></div>
				</div> {{-- end of .job-alerts --}}
				<div class="box job-bookmarks">
					<div class="box-header row middle-xs between-xs">
						<div class="box-title row middle-xs">
							<div class="icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
							<div class="text text-xs-uppercase">Job Bookmarks</div>
						</div>
						<div class="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>
					</div>
					<div class="box-content"></div>
				</div> {{-- end of .job-bookmarks --}}
			</div>
			<div class="col-md-6 col-xs-12 has-padL">
				<div class="box messages">
					<div class="box-header row middle-xs between-xs">
						<div class="box-title row middle-xs">
							<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
							<div class="text text-xs-uppercase">Messages</div>
						</div>
						<div class="refresh" onclick="load_messages()"><i class="fa fa-refresh" aria-hidden="true"></i></div>
					</div>
					<div class="box-content">
						<div class="messages-list"></div>
					</div>
				</div> {{-- end of .job-bookmarks --}}
			</div>
		</div>
	</div>

@stop

@section( 'inner-styles' )
@stop

@section( 'inner-scripts' )
	<script src="{{ url( 'assets/js/api-list.js' ) }}"></script>
	<script>
		$( function() {
			load_messages();
		});
	</script>
@stop