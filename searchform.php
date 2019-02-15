<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label for="s" class="screen-reader-text">Search</label>
	<input id="s" name="s" type="search" class="u-wide  search-form__input" placeholder="Search…" value="<?php echo esc_attr( get_search_query() ); ?>">

	<button class="search-form__button" title="Search" aria-label="Search"></button>
</form>