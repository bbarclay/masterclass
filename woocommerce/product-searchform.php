<form role="search" method="get" class="search-form  search-form--products" action="<?php echo home_url( '/' ); ?>">
	<label for="s" class="screen-reader-text">Search Products</label>
	<input id="s" name="s" type="search" class="u-wide  search-form__input" placeholder="Search Products…" value="<?php echo esc_attr( get_search_query() ); ?>">

	<input type="hidden" name="post_type" value="product">

	<button class="search-form__button" title="Search" aria-label="Search"></button>
</form>