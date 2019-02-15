<?php 
/*
* Template name: Video List
*/
get_header(); ?>
	<style>
	    .flex-mod .video-list {
	    	margin: 2em 0;
	    	overflow: hidden;
	    	position: relative;
	    }
	    .flex-mod .video-list .details .title {
		    font-size: 28px;
	    }
	    .flex-mod .video-list .details .description {
		    color: #6f6d6d;
		}
	    .flex-mod .video-list:after {
	    	content: '';
	    	clear: both;
	    	display: block;

	    }
		.flex-mod .player {
			margin-right: 30px;
		    float: left;
		    width: calc(65% - 30px);
		    -webkit-transition: all 0.3s ease;
		    transition: all 0.3s ease;
		}
		.flex-mod .player .video {
			margin-bottom: 15px;
		}
		.flex-mod .list {
			float: right;
			width: 35%;
			-webkit-transition: all 0.3s ease;
		    transition: all 0.3s ease;
		}
		.flex-mod .list .item {
			position: relative;
			cursor: pointer;
			padding: 12px 0;
			border-bottom: 1px solid #f9f9f9;
		}
		.flex-mod .list .item.hide {
			display: none;
		}
		.flex-mod .list .item:first-child {
			padding-top: 0;
		}
		.flex-mod .list .item .title {
			color: #002749;
			line-height: 1;
			margin-bottom: 0;
		}
		.flex-mod .list .item.active .title {
			color: #bfbcbb;
			margin-bottom: 0;
		}
/*		.flex-mod .list .item.active .image:after {
		    content: 'watching';
		    color: #fff;
		    position: absolute;
		    bottom: 7px;
		    left: 0;
		    right: 0;
		    text-align: center;
		    height: 23px;
		    background: rgb(241, 93, 34);
		    background: rgba(241, 93, 34, 0.8);
		    font-size: 14px;
		}*/
		.flex-mod .list .item:after {
			content: '';
			clear: both;
			display: block;
		}
		.flex-mod .list .item .image {
			float: left;
		    margin-right: 10px;
		    width: calc(40% - 10px);
		    min-height: 70px;
		    position: relative;
		}
		.flex-mod .list .item .info {
			float: right;
			width: 60%;
			color: #6f6d6d;
	
		}
		.flex-mod .list .item .date {
		    font-size: 16px;
		    color: #c1bfbf;
		}
		.flex-mod .list .show-more {
		    display: block;
		    text-align: center;
		    background: #f5f5f5;
		    padding: 7px;
		    color: #827f7f;
		}
		.flex-mod .list .show-more:hover {
		    background: #f15d22;
			color: #ffffff;
			cursor: pointer;
		}
		.flex-mod .player .bullets {
		    list-style: none; 
		    padding-left: 0;
		}

		.flex-mod .player .bullets li {
			    margin: 5px 0;
			    position: relative;
			    padding-left: 29px;
			    color: #6f6d6d;
		}
		.flex-mod .player .bullets li:before {
			    content: url(http://my.businessblueprint.com/wp-content/themes/mybusinessblueprint/images/check.svg);
			    position: absolute;
			    left: 0;
			    display: inline-block;
			    vertical-align: baseline;
			    width: 1em;
			    height: 1em;
			    top: 4px;
		}
		.flex-mod .player .details .date {
			display: block;
			margin-bottom: 20px;
			color: #ccc;
    		font-size: 17px;	
		}
		.flex-mod .player .item {
			display: none;
		}
		.flex-mod .player .item.active {
			display: block;
		}
		.flex-mod .details .date .genericon {
			font-size: 24px;
		}
		.flex-mod .pointers {
			margin-top: 20px;
			padding-top: 20px;
			border-top: 1px solid #f3f0f0;
		}
		.flex-mod .pointers h3 {
			font-size: 22px;
			margin-bottom: 15px;
		}
		.flex-mod .btn-download {
		    text-align: left;
		    list-style: none;
		    margin-bottom: 0;
		    padding-left: 0;
		}
		.flex-mod .btn-download li {
			display: inline-block;
		}
		.flex-mod .btn-download a span {
			font-size: 19px;
			text-transform: capitalize;
		}
		.flex-mod .btn-download .btn-navy {
			background: #002749;
		}
		.flex-mod .btn-download .btn-navy:hover {
			background: #000c16;
		}
		.flex-mod .btn-download .btn-orange {
			background: #f15d22;
		}	
		.flex-mod .btn-download .btn-orange:hover {
			background: #d3460d;
		}	
		.flex-mod .btn-download a {
		    display: block;
		    padding: 8px 12px;
		    margin-left: 5px;
		    line-height: 1;
		    background: #000;
		    border-radius: 5px;
		    font-weight: 700;
		    color: #fff;
		    -webkit-transition: background 0.5s ease;
		    transition: background 0.5s ease;
		}

        .flex-mod .btn-download .label {
        	    color: #ccc;
        }
        .flex-mod .video-list .video { 
			position: relative; 
			padding-bottom: 56.25%;
			height: 0;
			overflow: hidden;
			max-width: 100%;
			height: auto;
		} 

		.flex-mod .video-list .video iframe,
		.flex-mod .video-list .video object,
		.flex-mod .video-list .video embed { 
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		#icon-video {
			display: none;
		}
		#icon-video .icon {
		    margin-top: 3px;
		}
		.flex-mod aside.list .info ul {
		    list-style: none;
		    margin-bottom: 0;
		    -webkit-column-count: 2;
		    -moz-column-count: 2;
		    column-count: 2;
		    padding-left: 0;
		}
		.flex-mod aside.list .bullets li {
		    font-size: 13px;
		    margin: 0;
		    color: #6f6d6d;
		}
		@media screen and ( max-width: 600px ) {
			#icon-video .menu {
			    color: #002749;
			    height: 24px;
			    line-height: 24px;
			    display: inline-block;
			}
			#icon-video .icon {
			    width: 24px;
			    height: 24px;
			    margin-top: 0;
			    border: 1px solid #002749;
			    line-height: 24px;
			    color: #002749;
			    display: inline-block;
			}
			.flex-box .video-list {
				margin: 1em 0;
			}
			.flex-mod .player {
				width: 100%;
				margin-right: 0;
				margin-top: 0;
			}

			/* List in Mobile View */
			.flex-mod .list {
			    width: 100%;
			}
			.flex-mod .list.move {
				  transform: translateX(0);
			}
			#icon-video {
				cursor: pointer;
			    display: block;
			    color: #fff;
			    padding: 5px;
			    font-size: 15px;
			    width: auto;
			    text-align: right;
			    position: relative;
			    top: 0;
			    right: 0;
			    z-index: 5;
			}
			#icon-video .menu.hide {
				opacity: 0;
			}
			.flex-mod .player.goLeft {
			    transform: translateX(-35%);
			}
			.flex-mod .list .item {
			    padding: 10px;
			    border-bottom: 1px solid #f9f9f9;
			}
			.flex-mod .list .item .image {
			    margin-right: 20px;
			    width: calc( 40% - 20px );
			}
			.flex-mod .list .item .info {
			    margin-top: 0;
			    width: 60%;
			    color: #fff;
			}
			.flex-mod .list .item {
			    padding: 10px;
			}
		}
	</style>
	<main id="content" class="content flex-mod" tabindex="-1">
		<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
					<?php get_template_part( 'template-parts/modules/content/' . get_row_layout() ); ?>
				<?php endwhile; ?>
			<?php endwhile; ?>

		</div>
	</main>
	<script>
		(function($) {	
			var ctrl, 
			    player = $('.video-list .player'),
			    player_item = $('.video-list .player .item'),
			    list_item = $('.video-list .list .item');

				list_item.on('click', function(){

					//Deactivate current active
					list_item.removeClass('active');

					//Activate this item
					$(this).addClass('active');

					ctrl = $(this).attr('control');

					player_item.removeClass('active');

					$('.video-list .player .item-' + ctrl).addClass('active');
					$('html, body').animate({ scrollTop : 0}, 800);
							return false;

				});


		})(jQuery);
	</script>

<?php get_footer(); ?>