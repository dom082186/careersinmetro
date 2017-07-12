function load_messages() {
	$( '.box.messages .messages-list' ).html( '<div class="loading row middle-xs center-xs" style="padding: 10px;"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>' );
	$.ajax({
		url: get_url( 'api/messages' ) + '/' + get_token(),
		type: 'GET',
		dataType: 'html',
	})
	.done(function( data ) {
		var list = $( '.box.messages .messages-list' );
		list.hide().html( data ).fadeIn();
	});	
}

function get_url( url ) {
	var url = url || '',
		return_url = $( 'meta[name=root_url]' ).attr( 'content' );
	
	if (url != ''){
		return_url += '/' + url;
	}

	return return_url;
}

function get_token() {
	return $( 'meta[name=api_token]' ).attr( 'content' );
}