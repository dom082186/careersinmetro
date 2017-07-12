@if (\Session::has( 'success' ) )
    <div class="popup popup-success">
        <div class="popup-header row middle-xs">
            <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
            <h3 class="text-xs-uppercase">Success</h3>
            <div class="close-notif row middle-xs center-xs"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div> {{-- end of .popup-header --}}
        <div class="popup-message">
            {!! \Session::get( 'success' ) !!}
        </div>
    </div> {{-- end of .popup-success --}}
@elseif (\Session::has( 'error' ) )
    @if( isset( $page_name ) && $page_name == 'admin-login' )
        <div class="login-error"><i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i> {!! \Session::get( 'error' ) !!}</div>
    @else
        <div class="popup popup-error">
            <div class="popup-header row middle-xs">
                <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                <h3 class="text-xs-uppercase">Error</h3>
                <div class="close-notif row middle-xs center-xs"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div> {{-- end of .popup-header --}}
            <div class="popup-message">
                {!! \Session::get( 'error') !!}
            </div>
        </div> {{-- end of .popup-error --}}
    @endif  
@endif


@if ( isset( $errors ) && $errors->all() )
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-times" aria-hidden="true"></i> Error!
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach  
        </ul> 
      </div>
    </div><!-- /.col-sm-12 -->
  </div><!-- /.row -->                     
@endif