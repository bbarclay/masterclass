<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
    <!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122654663-2"></script>
    
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-122654663-2');
    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<a class="screen-reader-text  skip-link" href="#content">Skip to main content</a>

	<div class="site">
		<div class="site__top">
			<header class="header" itemscope itemtype="http://schema.org/WPHeader">
				<div class="container">
					<div class="grid">
						<div class="grid__column  grid__column--l-12">
							<a href="<?php echo home_url(); ?>" title="Return to homepage">
								<img src="<?php echo get_template_directory_uri(); ?>/images/businessblueprint-live-tagline.svg" class="logo">
							</a>
						</div>
					</div>
				</div>
			</header>


		</div>

		<div class="site__middle">