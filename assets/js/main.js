$( document ).ready( function() {

	NProgress.start();

	$( window ).load( function() {
		NProgress.done();
	});
	
	$( '.getImg' ).initialize( function() {
		$( this ).each( function() {
			var imgUrl = $( this ).find( 'img' ).attr( 'src' );
			$( this ).css( 'background-image', 'url(' + imgUrl +  ')' );
		});
	});

	$( '.menu-bar' ).initialize( function() {
		$( this ).on( 'click', function() {
			$( 'body' ).addClass( 'show-menu' );
			$( 'body' ).append( '<div class="back-drop"></div>' );
		})
	});

	$( '.back-drop' ).initialize( function() {
		$( this ).on( 'click', function() {
			$( this ).remove();
			$( 'body' ).removeClass( 'show-menu' );
		})
	});

	$( '.show-modal' ).initialize( function() {
		$( this ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.progress-bar' ).css({ 'opacity' : '0' });
			$( 'span.error' ).remove( '' );
			var modal = $( this ).attr( 'href' );
			$( '.modal-area' ).fadeOut();
			$( modal ).fadeIn();
			$( 'html' ).css( 'overflow', 'hidden' );
		})
	});

	$( '.close-modal' ).initialize( function() {
		$( this ).on( 'click', function() {
			$( '.progress-bar' ).css({ 'opacity' : '0' });
			$( 'span.error' ).remove( '' );
			$( this ).closest( '.modal-area' ).fadeOut();
			$( 'html' ).attr( 'style', '' );
			$( '.error' ).remove();
		});
	});

	$( '.modal-area' ).initialize( function() {
		$( this ).on( 'click', function() {
			$( '.progress-bar' ).css({ 'opacity' : '0' });
			$( 'span.error' ).remove( '' );
			$( this ).fadeOut();
			$( 'html' ).attr( 'style', '' );
			$( '.error' ).remove();
		});
	});

	$( '.content-area > *' ).on( 'click', function( e ) {
		e.stopPropagation();
	});

	$( document ).on( 'keydown', function ( e ) {
	    if ( e.keyCode === 27 ) {
	    	$( '.progress-bar' ).css({ 'opacity' : '0' });
			$( 'span.error' ).remove( '' );
	        $( '.modal-area' ).fadeOut();
	        $( 'html' ).attr( 'style', '' );
	        $( '.error' ).remove();
	    }
	});

	var getValue = $( '.get-value' ).find( 'li' );
	var hidden = $( '.get-value' ).closest( '.form-group' ).find( 'input[type=hidden]' );
	$( getValue ).on( 'click', function() {
		var value = $( this ).data( 'value' );
		$( hidden ).val( value );
	});

	$( '.has-dropdown' ).each( function() {
		var dropdown = $( this );

		$( '.toggle-menu', dropdown ).on( 'click', function() {
			div = $( '.dropdown-menu', dropdown );
			div.slideToggle().parent().toggleClass( 'active' );
			$( '.dropdown-menu' ).not( div ).slideUp().parent().removeClass( 'active' );
			return false;
		});
	});

	$( 'html' ).click(function(){
		$( '.dropdown-menu' ).slideUp();
		$( '.has-dropdown' ).removeClass( 'active' );
	});

	$( '.close-notif' ).initialize( function() {
		$( '.close-notif' ).on( 'click', function() {
			$( this ).closest( '.popup' ).fadeOut();
		});
	});

	$( '.toggle-sidebar' ).on( 'click', function() {
		$( 'body' ).toggleClass( 'toggle-sidebar' );
	});

	$( '.has-calendar' ).datepicker({
		maxDate 	: '-18yr',
		changeMonth : true,
		changeYear 	: true,
		dateFormat 	: 'mm/dd/yy',
		yearRange 	: '-60:' + new Date().getFullYear()
	});

	$( '.has-calendar' ).on( 'change', function() {
		$( this ).addClass( 'has-value' );
	});
});