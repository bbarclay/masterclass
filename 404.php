<?php get_header(); ?>

	<main id="content" class="content  content--404" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">

	   
	   		<header class="banner">
				<div class="container">
					<h1 class="banner__title">Nothing was found at this location.</h1>
				</div>
			</header>

			<div class="container">
				<p>This page either does not exist or has moved. Use the menu above or try a search to find what you are looking for.</p>

				<?php


				   	$query = esc_url( $_SERVER[REQUEST_URI] ); 

				   	if( $query == '/affiliates' || $query == '/partners' || $query == '/affiliate-centre'|| $query == '/partner-program' ) {

				   		echo '<div class="container"><div class="recommended-link"><h2><a href="http://affiliate.businessblueprint.com/log-in/" target="_blank">Are you looking for Affiliate Centre? Please click here</a></h2></div></div>';
				   	}

			    ?>
			</div> 	

	
	</main>

<?php get_footer(); ?>