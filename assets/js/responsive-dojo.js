$( document ).ready( function() {
	// form scripts
	$( '.form-group' ).initialize( function() {
		$( this ).each( function() {
			// $( this ).addClass( 'input-group' );
			var label = $( this ).find( 'label' );
			var input = $( this ).find( '.input-field' );

			$( input ).parent().addClass( 'input-group' );

			var animate = 
				'<span class="bar"></span>';
			$( animate ).insertAfter( input );
			$( input ).after( label );

			$( input ).blur( function() {
				if ( $( this ).val() != '' ) {
					$( this ).addClass( 'has-value' );
				} else {
					$( this ).removeClass( 'has-value' );
				}
			});

			$( input ).load( function() {
				if ( $( this ).val() != '' ) {
					$( this ).addClass( 'has-value' );
				} else {
					$( this ).removeClass( 'has-value' );
				}
			})

			$( input ).each( function() {
				if ( $( this ).val() != '' ) {
					$( this ).addClass( 'has-value' );
				} else {
					$( this ).removeClass( 'has-value' );
				}
			});

			if ( $( input ).siblings().hasClass( 'dropdown-list' ) ) {
				$( input ).attr( 'readonly', 'readonly' );
			}
			
			//with dropdown list
			var dropdown_parent = $( this ).find( '.dropdown-list' );
			var dropdown_list = $( dropdown_parent ).children( 'ul' ).actual( 'outerHeight' ) + 20;
			$( dropdown_parent ).css( 'height', dropdown_list );
			$( input ).focus( function() {
				$( '.dropdown-list' ).css({
					'opacity'	: '0',
					'z-index'	: '-1'
				});
				
				$( dropdown_parent ).css({
					'opacity'	: '1',
					'z-index'	: '2'
				});

				var search = $( this ).siblings( dropdown_parent ).find( '.filter-dropdown' );
				search.focus();
			});

			//getting data of dropdown list
			var list_item = $( this ).find( '.dropdown-list li' );
			$( list_item ).each( function() {
				if ( $( this ).is( '[data-value]' ) ) {
					
				} else {
					var text = $( this ).text().toLowerCase().split( ' ' ).join( '_' );
					$( this ).attr( 'data-value', text );
				}
			});

			$( list_item ).on( 'click', function() {
				var getVal = $( this ).text();
				$( this ).closest( '.dropdown-list' ).css({
					'opacity'	: '0',
					'z-index'	: '-2'
				});
				var input_field = $( this ).closest( '.form-group' ).find( '.input-field' );
				$( input_field ).addClass( 'has-value' ).val( getVal );
			});

			if ( $( input ).hasClass( 'has-search' ) ) {
				var search = 
				'<div class="search-field">' +
					'<input type="text" class="filter-dropdown" />' +
				'</div>';
				var insert = $( this ).closest( '.input-group' ).find( '.dropdown-list' );
				$( insert ).prepend( search );
			}

			$( '.filter-dropdown' ).keyup(function(){
				var value = $( this ).val();
				$( this ).closest( '.dropdown-list' ).find( 'li' ).each( function() {
					if ( $( this ).text().search( new RegExp(value, 'i' ) ) > -1 ) {
						$( this ).show();
					} else {
						$( this ).hide();
					}
				});
			});

			if ( $( input ).hasClass( 'has-datepicker' ) ) {
				$( this ).closest( '.input-group' ).addClass( 'has-calendar' );
			}

			$( '.dropdown-list' ).parent().addClass( 'has-dropdown' );

			$( this ).find( 'textarea' ).parent().addClass( 'has-textarea' );

			$( this ).find( '.rotate-check' ).parent().addClass( 'has-rotate-check' );
			$( this ).find( '.dot' ).parent().addClass( 'has-dot' );

			$( '.checkbox-list' ).each( function() {
				if ( $( this ).hasClass( 'has-rotate-check' ) ) {
					$( this ).closest( '.form-group' ).addClass( 'input-group' );
					var label = $( this ).find( 'label' );
					var input = $( this ).find( '.rotate-check' );
					$( input ).after( label );
				}
			});

			$( '.radio-list' ).each( function() {
				if ( $( this ).hasClass( 'has-rotate-check' ) ) {
					$( this ).closest( '.form-group' ).addClass( 'input-group' );
					var label = $( this ).find( 'label' );
					var input = $( this ).find( '.rotate-check' );
					$( input ).after( label );
				}
			});
		});
	});

	$( 'html' ).on( 'click', function(e) {
		e.stopPropagation();
		if ( !$( '.input-field, .filter-dropdown' ).is( ':focus' ) ) {
			$( '.dropdown-list' ).css({
				'opacity'	: '0',
				'z-index'	: '-2'
			});
		}
	});
})