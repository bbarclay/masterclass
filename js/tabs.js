( function( $ ) {
	$.fn.cascadeTabs = function() {
		return this.each( function() {
			/**
			 * Start monitoring scrolling.
			 *
			 * Monitor scrolling to allow interruption of scrolling in accordion mode.
			 */
			var didScroll;

			function cascadeTabsIsScrolling() {
				didScroll = true;
			}

			window.addEventListener( 'touchstart', cascadeTabsIsScrolling );
			window.addEventListener( 'wheel', cascadeTabsIsScrolling );

			// Get the tabs container.
			var $tabContainer = $( this );

			// Add ARIA attributes to tabs.
			$tabContainer.find( '[role="tabpanel"]' )
				.attr( 'aria-hidden', true );

			// Add ARIA attributes to tabs.
			$tabContainer.find('[role="tab"]')
				.attr( { 'aria-selected': false, 'aria-expanded': false } );

			/**
			 * Determine initial tab.
			 *
			 * If an element with an ID that matches the URL fragment identifier, select that
			 * tab, otherwise select the first tab.
			 */
			var $hashTab = window.location.hash ? $tabContainer.find( '[role="tabpanel"]' + window.location.hash ) : false;

			/* Get initial tab, and mark as such. */
			var $toTabPanel = ( $hashTab.length > 0 ? $hashTab : $tabContainer.find( '[role="tabpanel"]' ).first() )
				.attr( 'aria-hidden', false );

			/* Initialise previous tab variable. */
			var $fromTabPanel;

			/* Get selected tab panel and mark as such. */
			var $selectedTab = $tabContainer.find( '[aria-controls="' + $toTabPanel.attr( 'id' ) + '"]' )
				.attr( { 'aria-selected': true, 'aria-expanded': true } );


			/* Click events for tabs. */
			$tabContainer.on( 'click', '[role="tab"]', function( e ) {
				e.preventDefault();

				/* Get clicked tab. */
				$selectedTab = $( this );

				/* Store previous tab panel and update target panel. */
				$fromTabPanel = [$toTabPanel, $toTabPanel = $( '#' + $selectedTab.attr( 'aria-controls' ) )][0];

				/* Bail if current tab has just been clicked again. */
				if ( $fromTabPanel.attr('id') == $toTabPanel.attr('id') ) {
					return;
				}

				/* Toggle selected tab. */
				$tabContainer.find( '[role="tab"]' )
					.attr( 'aria-selected', 'false' )
					.attr('aria-expanded',false)
					.filter( '[aria-controls="' + $selectedTab.attr( 'aria-controls' ) + '"]' )
					.attr( 'aria-selected', 'true' )
					.attr('aria-expanded',true);

				/**
				 * Animate tab switch.
				 *
				 * On desktop use a fade effect. On mobile use an accordion effect.
				 */
				if ( $selectedTab.parents( '[role="tablist"]' ).length > 0 ) {
					/**
					 * Fade out previous tab and update ARIA attribute. Also reset opacity to 1, so
					 * that it is visible if expanded in accordion mode, where opacity is
					 * unaffected.
					 */
					$fromTabPanel.velocity( 'fadeOut', {
						duration: 150,
						begin:    function() {
							/**
							 * Set tab container minimum height so that it can't collapse until
							 * switch is over.
							 */
							$tabContainer.css( 'min-height', $tabContainer.height() );
						},
						complete: function() {
							$fromTabPanel.attr( 'aria-hidden', 'true' ).css( 'opacity', 1 );

							/**
							 * Wait until previous tab has faded out and fade in target tab. After faded in,
							 * update ARIA attribute.
							 */
							$toTabPanel.velocity( 'fadeIn', {
								duration: 150,
								complete: function() {
									$tabContainer.css( 'min-height', '' );
									$toTabPanel.attr( 'aria-hidden', 'false' );
								}
							} );
						}
					} );
				} else {
					/**
					 * Collapse previous tab and update ARIA attribute.
					 */
					$fromTabPanel.velocity( 'slideUp', {
						duration: 500,
						complete: function() {
							$fromTabPanel.attr( 'aria-hidden', 'true' );
						}
					} );

					/**
					 * Expand target tab and update ARIA attribute.
					 *
					 * If, as the previous tab collapses, the top of the target tab goes off-screen,
					 * scroll with it so that the beginning of the target tab is always visible.
					 * If the user scrolls during the animation, cease scrolling with the target
					 * tab.
					 */
					$toTabPanel.velocity( 'slideDown', {
						duration: 500,
						begin:    function() {
							/* Reset scroll monitoring. */
							didScroll = false;
						},
						progress: function( el ) {
							var panelTop = el[0].offsetTop,
							    tabTop = tabTop || $selectedTab.offset().top,
							    offset = offset || panelTop - tabTop,
							    scrollDestination = panelTop - offset;

							if ( scrollDestination < window.pageYOffset && ! didScroll ) {
								window.scrollTo( window.pageXOffset, scrollDestination );
							}
						},
						complete: function() {
							$toTabPanel.attr( 'aria-hidden', 'false' );
						}
					} );
				}
			} );
		} );
	}
} )( jQuery );