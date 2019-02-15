( function($) {
    var $content = $( '#content' ),
        $searchResults = $( '#search-results' ),
        $nav = $( '#navigation' ),
        $searchForm = $( '#search-form' );

    function showResults() {
        $content.hide();
        $searchResults.show();
    }

    function hideResults() {
        $searchResults.hide();
        $content.show();
    }

    function hideSearch() {
		$nav.show();
		$searchInput.val('').blur();
		$searchForm.hide();
        hideResults();
	}

	function showSearch() {
		$nav.hide();
		$searchForm.show();
		$searchInput.focus();
	}

    $( '.js-search-open' ).click( function(e) {
		e.preventDefault();
		showSearch();
	} );

	$( '.js-search-close' ).click( function(e) {
		e.preventDefault();
		hideSearch();
	} );

    $searchForm.add($searchResults).on( 'keydown', function( e ) {
		if ( e.which === 27 ) {
			hideSearch();
		}
	} );

    var search = instantsearch( {
        appId:     algolia.application_id,
        apiKey:    algolia.search_api_key,
        indexName: algolia.indices.searchable_posts.name,
        urlSync:   false,

        searchFunction: function( helper ) {
            if ( helper.state.query === '' ) {
                hideResults();
                return;
            }

            showResults();
            helper.search();
        }
    } );

    search.addWidget(
        instantsearch.widgets.searchBox( {
            container:   '#algolia-search-box',
            placeholder: 'Search for content, presentations or speakers...…',
            wrapInput:   false,
            poweredBy:   false,
            cssClasses:  {
                input: ['search-form__input']
            },
        } )
    );

    var hitTemplate = jQuery("#tmpl-search-result").html();

    var noResultsTemplate = 'No result was found for "<strong>{{query}}</strong>".';

    search.addWidget(
        instantsearch.widgets.hits( {
            container:   '#search-results-hits',
            hitsPerPage: 10,
            templates:   {
                empty: noResultsTemplate,
                item:  hitTemplate
            }
        } )
    );

    search.addWidget(
        instantsearch.widgets.pagination({
            container:     '#search-results-pagination',
            showFirstLast: false,
            labels:        {
                previous: ['← Previous'],
                next:     ['Next →']
            },
            cssClasses:    {
                root:     ['pagination'],
                item:     ['page-numbers'],
                active:   ['current'],
                next:     ['next'],
                previous: ['prev'],
                disabled: ['disabled']
            }
        })
    );

    search.templatesConfig.helpers.relevantContent = function() {
        var attributes = ['content', 'title6', 'title5', 'title4', 'title3', 'title2', 'title1'];
        var attribute_name;
        for ( var index in attributes ) {
            attribute_name = attributes[ index ];
            if ( this._highlightResult[ attribute_name ].matchedWords.length > 0 ) {
                return this._snippetResult[ attribute_name ].value;
            }
        }

        return this._snippetResult[ attributes[ 0 ] ].value;
    };

    search.start();

    $searchInput = $searchForm.find( 'input' ).attr( 'type', 'search' );

    $( '.js-search-open' ).show();
} )( jQuery );