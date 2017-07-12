$( document ).ready( function() {
	$( '#signUp-form' ).on( 'submit', function( e ) {
		e.preventDefault();
		var form = $( this );
		$( '.progress-bar' ).css({ 'opacity' : '1' });
		$( 'span.error' ).remove( '' );

		$.ajax({
			url: form.attr( 'action' ),
			type: form.attr( 'method' ),
			dataType: 'json',
			data: form.serialize(),
		})
		.done( function( data ) {
			if ( data.status == 'success' ) {
				$( '.alert-message' ).addClass( 'success' );
				$( '.alert-message' ).html( data.message );
				setTimeout( function() {
					location.reload( true );
					$( '.progress-bar' ).css({ 'opacity' : '0' });
				}, 3000 );
			} else {
				$.each( data, function( i, v ) {
					var msg = '<span class="error">' + v + '</span>';
					$( 'input[name="' + i + '"]' ).after( msg );
				});
				var keys = Object.keys( data );
          		$( 'input[name="' + keys[0] + '"]' ).focus();
				$( '.progress-bar' ).css({ 'opacity' : '0' });
			}
		});		
	});

	$( '#login-form' ).on( 'submit', function( e ) {
		e.preventDefault();
		var form = $( this );
		$( '.progress-bar' ).css({ 'opacity' : '1' });
		$( 'span.error' ).remove( '' );

		$.ajax({
			url: form.attr( 'action' ),
			type: form.attr( 'method' ),
			dataType: 'json',
			data: form.serialize()
		})
		.done( function( data ) {
			if ( data.status == 'success' ) {
				$( '.alert-message' ).addClass( 'success' );
				$( '.alert-message' ).html( data.message );
				setTimeout( function() {
					window.location.href = data.redirect;
				}, 3000 );
			} else if ( data.status == 'error' ) {
				$( '.alert-message' ).addClass( 'invalid' );
				$( '.alert-message' ).html( data.message );
				$( '.progress-bar' ).css({ 'opacity' : '0' });
			} else {
				$.each( data, function( i, v ) {
					var msg = '<span class="error">' + v + '</span>';
					$( 'input[name="' + i + '"]' ).after( msg );
				});
				var keys = Object.keys( data );
          		$( 'input[name="' + keys[0] + '"]' ).focus();
				$( '.progress-bar' ).css({ 'opacity' : '0' });
			}
		});
	});
});