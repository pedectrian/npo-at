<?php
/*
* npoat Functions
*
* @package wordpress
* @subpackage npoat
* @version 1.0.1
*
*/
// Set the content width, for videos and photos for defaults
if ( ! isset( $content_width ) )
	$content_width = 500;
	
/**
 * Class npoat
 */

Class npoat{
	/*
	 * Constructor
	 */
	 
	 function __construct() {
		// Load npoat text domain
		load_theme_textdomain('npoat', TEMPLATEPATH. '/languages');
		
		// Theme supports
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		
		// Editor style for TinyMCE.
		add_editor_style();
		
		// Register image sizes
		add_image_size( 'home-page-slider', 440, 250, true );
		
		// Add shortcodes
		add_shortcode( 'column', array( &$this, 'npoat_column' ) );

		// Register our primary navigation (top left) ans 404 page links
		if ( function_exists( 'register_nav_menu' ) ) {
			add_theme_support( 'nav_menus' );
			register_nav_menu( 'primary', __( 'Primary Navigation Menu', 'npoat') );
		}
		
		/*
		 * Registers sidebars for widgets
		 */
		 
		add_action( 'widgets_init', array( &$this, 'register_sidebars' ) );
		
	}
		/*
	 * Register Sidebars
	 *
	 * Registers a single right sidebar ready for widgets.
	 *
	 */
	function register_sidebars() {
		register_sidebar( array(
			'name' => __( 'Home page Sidebar', 'sipahiler' ),
			'id' => 'sidebar-home',
			'description' => __( 'The sidebar for the Home Template', 'sipahiler' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div><div class="widget-text">',
		) );
	}
	
	function npoat_column( $atts, $content ) {
		extract( shortcode_atts( array(
			'position' => '',
			'title' => ''
		), $atts ) );
		if ( $position == 'left' ) {
			$content = wpautop( $content );
			$output = "<h2 class='single-page-title'>" . $title . "</h2>";
			$output .=  "<div class='grid_7 alpha'><div class='left-column'>";
			$output .=  $content;
			$output .=  "</div></div>";
		}
		elseif ( $position == 'right' ) {
			$output = "<div class='grid_5 omega'><div class='right-column'>{$content}</div></div>";
		}
		return $output;
	}
}

// Initialize the above class after theme setup
add_action( 'after_setup_theme', create_function( '', 'global $npoat; $npoat = new npoat();' ) );