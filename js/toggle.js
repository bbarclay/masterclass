( function( $ ) {
	/**
	 * Store button label for use when re-opening.
	 */
	$( '.js-cascade-toggle' ).attr( 'data-label-open', function() {
		return $(this).text();
	} );

	/**
	 * When clicked, toggle aria-expanded attribute on self, and toggle is-open
	 * class on target of aria-controls attribute.
	 */
	$( '.js-cascade-toggle' ).click( function() {
		var toggle = $( this );
		var target = $( '#' + toggle.attr( 'aria-controls' ) );
		var expanded = target.is(':visible');

		target.slideToggle({
			duration: 150,
			complete: function() {
				expanded = target.is(':visible');
				toggle.attr('aria-expanded', expanded).text( expanded ? toggle.data( 'label-close' ) : toggle.data( 'label-open' ) );
				target.toggleClass('is-open',expanded);
			}
		});
	} );
} )( jQuery );
