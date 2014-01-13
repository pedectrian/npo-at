<?php 
/*
 * The Header for all pages
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 2.0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title>
			<?php
			global $page, $paged;
			wp_title( '|', true, 'right' );
			bloginfo( 'name' );
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'npoat' ), max( $paged, $page ) );
			?>
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/960.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?2.0.1" />
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" />
		<![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-6772675-4']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="header-wrapper">
			<div class="container_16 header">
				<div class="grid_6 logo">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
				<div class="grid_5">
					&nbsp;
				</div>
				<div class="grid_2" style='text-align: center;margin-top: 22px;'>
					<a href='http://npo-at.com' <?php if($_SERVER['HTTP_HOST'] == 'npo-at.com'){ echo 'style="font-weight: bold;"';} ?>>РУС</a>
					<a href='http://en.npo-at.com' <?php if($_SERVER['HTTP_HOST'] == 'en.npo-at.com'){ echo 'style="font-weight: bold;"';} ?>>ENG</a>
				</div>
				<div class="grid_3 search">
					<?php get_search_form(); ?>
				</div>
				<br class="clear" />
				<div class="grid_12 navmenu">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
				<br class="clear" />
			</div>
		</div>
